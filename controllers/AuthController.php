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

                if ($user && $input_password === $user['password'] && $user['role'] === 'admin') {
                    $_SESSION['admin_user'] = $user['username'];
                    $_SESSION['admin_name'] = $user['first_name'].' '.$user['last_name'];
                    $_SESSION['admin_avatar'] = (string)$this->imageModel->getImageByTargetId($user['id'], ImageType::Avatar->value);
                    $_SESSION['admin_user_id'] = $user['id'];
                    $_SESSION['admin_auth'] = true;
                    $this->logModel->log(Action::Login->value, $user['id'], $user['username'] . " (admin) logged in");
                    
                    header("Location: ".SITE_URL."/admin/dashboard");
                    exit();
                } elseif ($user && password_verify($input_password, $user['password'])) {
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

                if ($this->authModel->isUsernameTaken($input_username)) {
                    $error_message = "Username already taken.";
                    require_once 'views/auth/register.php';
                    return;
                }

                // Proceed with user registration
                $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);
                $this->authModel->addNewUser($input_username, $input_email, $hashed_password, $input_phone, $input_address);

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
            }              
        } else {
            require_once 'views/auth/register.php';
        }
    }

}