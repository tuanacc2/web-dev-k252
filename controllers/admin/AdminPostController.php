<?php
require_once BASE_DIR .'/models/PostModel.php';
require_once BASE_DIR .'/models/AuditLoggerModel.php';

class AdminPostController {

    private AuditLoggerModel $logModel;
    private PostModel $postModel;

    public function __construct() {
        $this->logModel = new AuditLoggerModel();
        $this->postModel = new PostModel();
    }

    public function posts() {
        $posts = $this->postModel->getPost();

        require_once 'views/posts.php';
    }

    public function postDetail(int $post_id) {
        $post = $this->postModel->getPostById($post_id);

        require_once 'views/postDetail.php';
    }

    public function deletePost(int $post_id) {
    }
}