<?php
require_once 'models/PostModel.php';

class PostController {
    public function listPosts() {
        $model = new PostModel();
        $posts = $model->getPost();

        require_once 'views/listPosts.php';
    }
}