<?php
require_once BASE_DIR .'/models/UserModel.php';

class UserController {

    public function profile() {
        $users = (new UserModel())->getUserById($_SESSION['user_id']);

        require_once 'views/profile.php';
    }

    public function history() {
        require_once 'views/history.php';
    }

    public function cart() {
        require_once 'views/cart.php';
    }
}