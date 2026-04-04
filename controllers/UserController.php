<?php
require_once 'models/UserModel.php';

class UserController {
    public function info() {
        $model = new UserModel();
        $users = $model->getAllUsers();

        require_once 'views/user_list.php';
    }

    public function history() {
        $model = new UserModel();
        $users = $model->getAllUsers();

        require_once 'views/history.php';
    }

    public function cart() {
        $model = new UserModel();
        $users = $model->getAllUsers();

        require_once 'views/cart.php';
    }
}