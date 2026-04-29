<?php
require_once BASE_DIR .'/models/UserModel.php';

class AdminUserController {
    public function users() {
        $users = (new UserModel())->getUserById($_SESSION['user_id']);

        require_once 'views/admin/user.php';
    }
}