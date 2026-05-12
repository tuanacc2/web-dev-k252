<?php
require_once BASE_DIR .'/models/PostModel.php';
require_once BASE_DIR .'/models/CategoryModel.php';

class PostController {
    private AuditLoggerModel $logModel;
    private PostModel $postModel;
    private CategoryModel $categoryModel;

    public function __construct() {
        $this->logModel = new AuditLoggerModel();
        $this->postModel = new PostModel();
        $this->categoryModel = new CategoryModel();
    }

    public function posts() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';

        $category_list = $this->categoryModel->getCategories(Category::Post);

        $posts = [];

        $limit = 6;

        $page = (int)(isset($_GET['page']) ? ($_GET['page']) : 0) ? (int)$_GET['page'] : 1;

        // If user choose to see only one kind of category 
        $total = 0;
        $totalPage = 0;

        if ($category) {
        
            $limit = 6; $category_id = 0;
            foreach ($category_list as $cat) {
                if ($cat['name'] === $category) {
                    $category_id = $cat['id'];
                }
            }

            if ($category === 'uncategorized') {
                $posts[0] = $this->postModel->getPost(
                    search: $search, 
                    category_id: null,
                    categorized: PostModel::UNCATEGORIZED
                );
            } else {
                $posts[0] = $this->postModel->getPost(
                    search: $search, 
                    category_id: $category_id
                );
            }

            $total = count($posts[0]);
            $totalPage = ceil($total / $limit);

            if ($category === 'uncategorized') {
                $posts[0] = $this->postModel->getPost(
                    search: $search, 
                    limit: $limit, 
                    offset: (($page - 1) <= 0 ? 0 : ($page - 1)) * $limit, 
                    category_id: null,
                    categorized: PostModel::UNCATEGORIZED
                );
            } else {
                $posts[0] = $this->postModel->getPost(
                    search: $search, 
                    limit: $limit, 
                    offset: (($page - 1) <= 0 ? 0 : ($page - 1)) * $limit, 
                    category_id: $category_id
                );
            }
            
        } else {
    
            $limit = 3;

            for ($i = 0; $i < count($category_list); $i++) {
                $posts[$i] = $this->postModel->getPost($search, category_id: $category_list[$i]['id']);
            }
        }

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