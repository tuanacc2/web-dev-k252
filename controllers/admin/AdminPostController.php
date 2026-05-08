<?php
require_once BASE_DIR .'/config/admin/idQuery.php';
require_once BASE_DIR .'/models/admin/AdminPostModel.php';
require_once BASE_DIR .'/models/PostModel.php';
require_once BASE_DIR .'/models/CategoryModel.php';
require_once BASE_DIR .'/models/AuditLoggerModel.php';
require_once BASE_DIR .'/models/ImageModel.php';

class AdminPostController {

    private AuditLoggerModel $logModel;
    private AdminPostModel $postModel;
    private PostModel $postModelPublic;
    private CategoryModel $categoryModel;
    private ImageModel $imageModel;

    public function __construct() {
        $this->logModel = new AuditLoggerModel();
        $this->postModel = new AdminPostModel();
        $this->postModelPublic = new PostModel();
        $this->categoryModel = new CategoryModel();
        $this->imageModel = new ImageModel();
    }

    public function posts() {
        $search = $_GET['search'] ?? '';
        $category = $this->categoryModel->getCategories('post');

        $posts = [];

        for ($i = 0; $i < count($category); $i++) {
            $posts[$i] = $this->postModelPublic->getPost($search, category_id: $category[$i]['id']);
        }

        $posts[count($category)] = $this->postModelPublic->getPost($search, category_id: null, uncategorized: true);
        $categories = $this->categoryModel->getCategories('post');

        require_once 'views/admin/post.php';
    }

    public function postDetail(int $post_id) {
        $post = $this->postModelPublic->getPostById($post_id);
        $categories = $this->categoryModel->getCategories('post');

        require_once 'views/admin/post/detail.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $categoryType = $_POST['category'] ?? '';
            $thumbnail_description = $_POST['description'] ?? '';
            $content = $_POST['content'] ?? '';
            $author_id = $_SESSION['user_id'] ?? null;
            $file = $_FILES['thumbnail'] ?? null;

            if (!$title) {
                $_SESSION['error'] = 'Please fill in all required fields.';
                header('Location: ' . SITE_URL . 'admin/post/add');
                exit();
            }

            try {
                $post_id = $this->postModel->addPost($title, $thumbnail_description, $author_id, $content, $categoryType, $file);
                if ($post_id) {
                    $this->logModel->log(Action::AddPost->value, $_SESSION['auth_id'], 'Add a new post: '.$title, $post_id);
                    $_SESSION['success'] = 'Post added successfully.';
                } else {
                    $_SESSION['error'] = 'Failed to add post.';
                }
            } catch (Exception $e) {
                // Log error or handle it as needed
                $_SESSION['error'] = 'An error occurred while adding the post.';
                exit();
            }
            
            header('Location: ' . SITE_URL . 'admin/post');
        }

        require_once 'views/error404.php';
    }

    public function deletePost(int $post_id) {
    }
}