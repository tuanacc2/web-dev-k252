<?php
require_once BASE_DIR .'/models/AuthModel.php';
require_once BASE_DIR .'/models/AuditLoggerModel.php';
require_once BASE_DIR .'/models/ImageModel.php';

class AuthController {
    private AuditLoggerModel $logModel;
    private AuthModel $authModel;
    private ImageModel $imageModel;

    public function __construct() { 
        $this->logModel = new AuditLoggerModel();
        $this->authModel = new AuthModel();
        $this->imageModel = new ImageModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $input_username = $_POST['username'];
                $input_password = $_POST['password'];

                $user = $this->authModel->getUserByUsername($input_username);
                $storedPassword = (string)($user['password'] ?? '');
                $passwordInfo = password_get_info($storedPassword);
                $isHashedPassword = ($passwordInfo['algo'] ?? 0) !== 0;
                $isPasswordValid = $isHashedPassword
                    ? password_verify($input_password, $storedPassword)
                    : hash_equals($storedPassword, $input_password);

                // Upgrade legacy plain-text password to a secure hash after successful login.
                if ($user && $isPasswordValid && !$isHashedPassword) {
                    $newHash = password_hash($input_password, PASSWORD_DEFAULT);
                    $this->authModel->updatePasswordHashById((int)$user['id'], $newHash);
                    $user['password'] = $newHash;
                }

                if ($user && $isPasswordValid && $user['role'] === 'admin') {
                    $_SESSION['admin_user'] = $user['username'];
                    $_SESSION['admin_name'] = $user['first_name'].' '.$user['last_name'];
                    $_SESSION['admin_avatar'] = (string)$this->imageModel->getImageByTargetId($user['id'], ImageType::Avatar->value);
                    $_SESSION['admin_user_id'] = $user['id'];
                    $_SESSION['admin_auth'] = true;
                    $this->logModel->log(Action::Login->value, $user['id'], $user['username'] . " (admin) logged in");
                    
                    header("Location: ".SITE_URL."/admin/dashboard");
                    exit();
                } elseif ($user && $isPasswordValid) {
                    $_SESSION['user'] = $user['username'];
                    $_SESSION['name'] = $user['first_name'].' '.$user['last_name'];
                    $_SESSION['avatar'] = (string)$this->imageModel->getImageByTargetId($user['id'], ImageType::Avatar->value);
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['login_status'] = true;

                    $this->logModel->log(Action::Login->value, $user['id'], $user['username'] . " logged in");

                    header("Location: ".SITE_URL."/homepage");
                    exit();
                } else {
                    throw new Exception("Invalid username or password.");
                }
            } catch (Exception $e) {
                $error_message = "An error occurred during login. Please try again.";
                require_once 'views/auth/login.php';
            }              
        } else {
            require_once 'views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: ".SITE_URL."/homepage");
        exit();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $input_username = $_POST["username"];
                $input_password = $_POST["password"];
                $input_email = $_POST["email"];
                $input_phone = $_POST["phone"];
                $input_address = $_POST["address"];
                $input_first_name = $_POST["first_name"] ?? '';
                $input_last_name = $_POST["last_name"] ?? '';

                if ($this->authModel->isUsernameTaken($input_username)) {
                    $error_message = "Username already taken.";
                    require_once 'views/auth/register.php';
                    return;
                }

                // Proceed with user registration
                $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);
                $newId = $this->authModel->addNewUser($input_username, $hashed_password, $input_first_name, $input_last_name, $input_email, $input_phone, $input_address);

                if (!$newId) {
                    throw new Exception('Failed to create user');
                }

                $user = $this->authModel->getUserByUsername($input_username);

                $_SESSION['user'] = $user['username'];
                $_SESSION['name'] = $user['first_name'].' '.$user['last_name'];
                $_SESSION['avatar'] = "/assets/images/default_user_avatar/avatar1.jpg";
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['login_status'] = true;

                $this->logModel->log(Action::Register->value, $user['id'], $input_username . " registered an account");

                header("Location: ".SITE_URL."/homepage");
            } catch (Exception $e) {
                $error_message = "An error occurred during registration. Please try again.";
                require_once 'views/auth/register.php';
            }              
        } else {
            require_once 'views/auth/register.php';
        }
    }

}