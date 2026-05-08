<?php
require_once BASE_DIR .'/models/PostModel.php';

class PostController {
    private AuditLoggerModel $logModel;
    private PostModel $postModel;

    public function __construct() {
        $this->logModel = new AuditLoggerModel();
        $this->postModel = new PostModel();
    }

    public function posts() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $limit = 12;
        $page = isset($_GET['page']) && is_int($_GET['page']) ? (int)($_GET['page']) : 1;
        $total = count($this->postModel->getPost($search));
        $totalPage = ceil($total / $limit);

        $posts = $this->postModel->getPost(search: $search, limit: $limit, offset: ($page - 1) * $limit);

        foreach ($posts as &$post) {
            $post['updated_at'] = $post['updated_at'] ? date_create($post['updated_at'])->format('d.m.y') : null;
        }
        unset($post);

        require_once 'views/posts.php';
    }

    public function postDetail(int $post_id) {
        $post = $this->postModel->getPostById($post_id);

        if (!$post) {
        // Handle 404 if post doesn't exist
            require_once 'views/error404.php';
            return;
        }

        $popularPosts = $this->postModel->getRecentPosts();

        $title = $post['title'] ?? 'Bài viết';
        $createdAt = $post['created_at'] ? date_create($post['created_at'])->format('d.m.y') : null;
        $updatedAt = $post['updated_at'] ? date_create($post['updated_at'])->format('d.m.y') : null;
        $author = $post['author'] ?? '';
        $category = $post['category'] ?? '';
        $siteContent = $post['content'] ?? '';

        require_once 'views/post/detail.php';
    }
}