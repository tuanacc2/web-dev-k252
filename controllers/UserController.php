<?php
require_once 'models/UserModel.php';

class UserController {
    public function info() {
        $model = new UserModel();
        $users = $model->getAllUsers();

        require_once 'views/user_list.php';
    }

    public function history() {
        require_once 'views/history.php';
    }

    public function cart() {
        require_once 'views/cart.php';
    }
}