<?php
require_once BASE_DIR .'/models/admin/AdminUserModel.php';
require_once BASE_DIR .'/models/AuditLoggerModel.php';

class AdminUserController {
    private AdminUserModel $userModel;
    private AuditLoggerModel $logModel;

    public function __construct() {
        $this->userModel = new AdminUserModel();
        $this->logModel = new AuditLoggerModel();
    }

    public function users() {
        $users = $this->userModel->getAllUsers();

        require_once 'views/admin/user.php';
    }

    public function toggle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';

            if ($id == $_SESSION['admin_id'] || $id === 1) {
                $_SESSION['error'] = "Bạn không thể tự hạn chế chính mình!";
                echo "Bạn không thể tự hạn chế chính mình!";
                exit();
            } else {
                $this->userModel->updateStatus($id, $status ? false : true, $status ? -1 : 1);
            }

            $this->logModel->log(Action::ToggleUser, $_SESSION['auth_id'], $username.' restriction got '.($status ? 'removed' : 'add').' by '.$_SESSION['admin_name']);

            header("Location: " . SITE_URL . "/admin/user");
        }
        require 'views/error404.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
            $username = isset($_POST['username']) ? $_POST['username'] : '';

            if ($id == $_SESSION['admin_id'] || $id === 1 || $username === 'admin') {
                $_SESSION['error'] = "Bạn không thể tự xóa chính mình!";
                echo "Bạn không thể tự xóa chính mình!";
                exit();
            } else {
                $this->userModel->deleteUserById($id);
                $_SESSION['success'] = "Đã xóa người dùng.";
            }

            $this->logModel->log(Action::DeleteUser, $_SESSION['auth_id'], $username.' got removed by '.$_SESSION['admin_name']);

            header("Location: " . SITE_URL . "/admin/user");
        }
        require 'views/error404.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $firstName = isset($_POST['firstname']) ? $_POST['firstname'] : '';
            $lastName = isset($_POST['lastname']) ? $_POST['lastname'] : '';
            $email  = isset($_POST['email']) ? $_POST['email'] : '';
            $phone  = isset($_POST['phone']) ? $_POST['phone'] : '';
            $address  = isset($_POST['address']) ? $_POST['address'] : '';
            $password  = isset($_POST['password']) ? $_POST['password'] : '';
            $file = $_FILES['avatar'] ?? null;

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            try {
                $id = $this->userModel->addAdmin($username, $hashed_password, $firstName, $lastName, $email, $phone, $address, $file);
                if ($id) {
                    $_SESSION['success'] = "Thêm Admin thành công!";
                    $this->logModel->log(Action::AddAdmin,  $_SESSION['auth_id'], $username.' got added by '.$_SESSION['admin_name'].' with Admin role', $id);
                } else {
                    echo "Thêm Admin thất bại";
                    exit();
                }
            } catch (Exception $e) {
                // Log error or handle it as needed
                $_SESSION['error'] = 'An error occurred while adding Admin.';
                echo 'Some error occur.';
                exit();
            }

            header("Location: " . SITE_URL . "/admin/user");
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
            header("Location: " . SITE_URL . "/admin/user");
        }
        require_once 'views/error404.php';
    }
}