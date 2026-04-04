<?php
require_once 'models/PostModel.php';

class PostController {
    public function product() {
        $model = new UserModel();
        $users = $model->getAllUsers();

        require_once 'views/user_list.php';
    }
}