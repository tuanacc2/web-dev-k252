<?php
require_once BASE_DIR .'/models/UserModel.php';
require_once BASE_DIR .'/models/AuditLoggerModel.php';

class UserController {

    private UserModel $userModel;
    private AuditLoggerModel $logModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->logModel = new AuditLoggerModel();
    }

    public function profile() {
        $id =($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
        
        $user = $this->userModel->getUserById($id);

        require_once 'views/profile.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
            $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            if ($_SESSION['login_status'])
                $this->userModel->deleteUserById($id);

            $this->logModel->log(Action::DeleteUser, $id, $username.' self deleted');

            header("Location: " . SITE_URL . "/homepage");
        }
        require_once 'views/error404.php';
    }
    public function restricted() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
            $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

            $this->userModel->selfToggle($id, true, 24);

            $this->logModel->log(Action::ToggleUser, $id, $username.' self restricted', $id);

            header("Location: " . SITE_URL . "/user/profile");
        }
        require_once 'views/error404.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $avatar_id = isset($_POST['avatar_id']) ? $_POST['avatar_id'] : '';
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $firstName = isset($_POST['firstname']) ? $_POST['firstname'] : '';
            $lastName = isset($_POST['lastname']) ? $_POST['lastname'] : '';
            $email  = isset($_POST['email']) ? $_POST['email'] : '';
            $phone  = isset($_POST['phone']) ? $_POST['phone'] : '';
            $address  = isset($_POST['address']) ? $_POST['address'] : '';
            $password  = isset($_POST['password']) ? $_POST['password'] : '';
            $file = $_FILES['avatar'] ?? null;

            $hashed_password = $password ? password_hash($password, PASSWORD_DEFAULT) : '';
            
            try {
                $flag = $this->userModel->updateUser(
                    id: $id, 
                    password: $hashed_password, 
                    firstName: $firstName, 
                    lastName: $lastName, 
                    email: $email, 
                    phone: $phone, 
                    address: $address, 
                    file: $file, 
                    removeAvatar: !$avatar_id ? true : false);
                if ($flag) {
                    $_SESSION['success'] = "Thêm Admin thành công!";
                    $this->logModel->log(Action::AddAdmin,  $_SESSION['auth_id'], $username.' i got changed', $id);
                } else {
                    echo "Cập nhật user thất bại";
                    exit();
                }
            } catch (Exception $e) {
                // Log error or handle it as needed
                $_SESSION['error'] = 'An error occurred while adding Admin.';
                echo 'Some error occur.';
                
                exit();
            }
            header("Location: " . SITE_URL . "/user/profile");
        }
        require_once 'views/error404.php';
    }
}