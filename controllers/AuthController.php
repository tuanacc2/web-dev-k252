<?php
require_once 'models/UserModel.php';
require_once 'models/AuditLoggerModel.php';

class AuthController {
    private $logModel;
    private $userModel;

    public function __construct() { 
        $this->logModel = new AuditLoggerModel();
        $this->userModel = new UserModel();
    }

    public function login() {
        global $base_url;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $input_username = $_POST['username'];
                $input_password = $_POST['password'];

                $user = $this->userModel->getUserByUsername($input_username);

                if ($user && password_verify($input_password, $user['password'])) {
                    $_SESSION['user'] = $user['username'];
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['login_status'] = true;

                    $this->logModel->log(Action::Login->value, $user['id'], $user['username'] . " logged in");

                    header("Location: $base_url/dashboard");
                    exit();
                } else {
                    throw new Exception("Invalid username or password.");
                }
            } catch (Exception $e) {
                $error_message = "An error occurred during login. Please try again. ". $e->getMessage();
                require_once 'views/auth/login.php';
            }              
        } else {
            require_once 'views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        global $base_url;
        header("Location: $base_url/homepage");
        exit();
    }

    public function register() {
        global $base_url;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $input_username = $_POST["username"];
                $input_password = $_POST["password"];
                $input_email = $_POST["email"];
                $input_phone = $_POST["phone"];
                $input_address = $_POST["address"];

                if ($this->userModel->isUsernameTaken($input_username)) {
                    $error_message = "Username already taken.";
                    require_once 'views/auth/register.php';
                    return;
                }

                // Proceed with user registration
                $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);
                $this->userModel->addNewUser($input_username, $input_email, $hashed_password, $input_phone, $input_address);
                $_SESSION['user'] = $input_username;

                $user = $this->userModel->getUserByUsername($input_username);

                $this->logModel->log(Action::Register->value, $user['id'], $input_username . " registered an account");

                header("Location: $base_url/auth/login");
            } catch (Exception $e) {
                $error_message = "An error occurred during registration. Please try again. ". $e->getMessage();
                require_once 'views/auth/register.php';
            }              
        } else {
            require_once 'views/auth/register.php';
        }
    }

}