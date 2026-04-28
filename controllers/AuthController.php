<?php
require_once 'models/UserModel.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $input_username = $_POST['username'];
                $input_password = $_POST['password'];

                $user = (new UserModel())->getUserByUsername($input_username);

                if ($user && password_verify($input_password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['login_status'] = true;

                    header("Location: /dashboard");
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
        header("Location: /homepage");
        exit();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $input_username = $_POST["username"];
                $input_password = $_POST["password"];
                $input_email = $_POST["email"];

                $model = new UserModel();

                if ($model->isUsernameTaken($input_username)) {
                    $error_message = "Username already taken.";
                    require_once 'views/auth/register.php';
                    return;
                }

                // Proceed with user registration
                $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);
                $model->addNewUser($input_username, $input_email, $hashed_password);
                $_SESSION['user'] = $model;
            } catch (Exception $e) {
                $error_message = "An error occurred during registration. Please try again.";
                require_once 'views/auth/register.php';
            }              
        } else {
            require_once 'views/auth/register.php';
        }

        global $base;

        header("Location: $base/auth/login");
        exit();
    }

}