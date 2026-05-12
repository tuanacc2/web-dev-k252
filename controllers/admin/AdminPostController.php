<?php
require_once BASE_DIR .'/config/admin/idQuery.php';
require_once BASE_DIR .'/models/admin/AdminPostModel.php';
require_once BASE_DIR .'/models/PostModel.php';
require_once BASE_DIR .'/models/CategoryModel.php';
require_once BASE_DIR .'/models/AuditLoggerModel.php';

class AdminPostController {

    private AuditLoggerModel $logModel;
    private AdminPostModel $postModel;
    private PostModel $postModelPublic;
    private CategoryModel $categoryModel;

    public function __construct() {
        $this->logModel = new AuditLoggerModel();
        $this->postModel = new AdminPostModel();
        $this->postModelPublic = new PostModel();
        $this->categoryModel = new CategoryModel();
    }

    public function posts() {
        $search = $_GET['search'] ?? '';
        $category = $this->categoryModel->getCategories(Category::Post);

        $posts = [];

        for ($i = 0; $i < count($category); $i++) {
            $posts[$i] = $this->postModelPublic->getPost($search, category_id: $category[$i]['id']);
        }

        $posts[count($category)] = $this->postModelPublic->getPost($search, category_id: null, categorized: PostModel::UNCATEGORIZED);
        $categories = $this->categoryModel->getCategories(Category::Post);

        require_once 'views/admin/post.php';
    }

    public function postDetail(int $post_id) {
        $post = $this->postModelPublic->getPostById($post_id);
        $categories = $this->categoryModel->getCategories(Category::Post);

        require_once 'views/admin/post/detail.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $thumbnail_description = $_POST['description'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $content = $_POST['content'] ?? '';
            $file = $_FILES['thumbnail'] ?? null;
            
            $author_id = $_SESSION['admin_id'] ? (int)$_SESSION['admin_id'] : null;

            if (!$title) {
                $_SESSION['error'] = 'Please fill in all required fields.';
                echo 'Please fill in title field.';
                exit();
            }

            try {
                $post_id = $this->postModel->addPost(
                    title: $title, 
                    thumbnail_description: $thumbnail_description, 
                    author_id: $author_id, 
                    content: $content, 
                    category_id: $category_id, 
                    file: $file
                );
                if ($post_id) {
                    $this->logModel->log(Action::AddPost, $_SESSION['admin_id'], 'Add a new post: '.$title, $post_id);
                    $_SESSION['success'] = 'Post added successfully.';
                } else {
                    $_SESSION['error'] = 'Failed to add post.';
                    echo 'Failed to add post.';
                    exit();
                }
            } catch (Exception $e) {
                // Log error or handle it as needed
                $_SESSION['error'] = 'An error occurred while adding the post.';
                echo 'Please fill in title field.';
                exit();
            }
            
            header('Location: ' . SITE_URL . '/admin/post');
        }

        require_once 'views/error404.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post_id = $_POST['id'] ?? null;
            $title = $_POST['title'] ?? '';
            $thumbnail_id = $_POST['thumbnail_id'] ?? '';
            $pre_thumbnail_id = $_POST['pre_thumbnail_id'] ?? '';
            $thumbnail_description = $_POST['description'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $content = $_POST['content'] ?? '';
            $file = $_FILES['thumbnail'] ?? null;
            
            $author_id = $_SESSION['admin_id'] ? (int)$_SESSION['admin_id'] : null;

            if (!$title) {
                $_SESSION['error'] = 'Please fill in all required fields.';
                echo 'Please fill in title field.';
                exit();
            }

            try {
                $postId = (int) ($post_id ?? 0);
                if ($postId <= 0) {
                    $_SESSION['error'] = 'Invalid post ID.';
                    echo 'Invalid post ID.';
                    exit();
                }

                $updated = $this->postModel->updatePost(
                    post_id:$postId, 
                    title: $title, 
                    thumbnail_description: $thumbnail_description, 
                    content: $content, 
                    category_id: $category_id, 
                    file: $file,
                    removeThumbnail: !$thumbnail_id ? true : false
                );
                if ($updated) {
                    $this->logModel->log(Action::UpdatePost, $_SESSION['admin_id'], 'Updated post: '.$title, $postId);
                    $_SESSION['success'] = 'Post updated successfully.';
                } else {
                    $_SESSION['error'] = 'Failed to update post.';
                    echo 'Failed to update post.';
                    exit();
                }
            } catch (Exception $e) {
                // Log error or handle it as needed
                $_SESSION['error'] = 'An error occurred while updating the post.';
                echo 'An error occurred while updating the post.';
                exit();
            }
            
            header('Location: ' . SITE_URL . '/admin/post');
        }

        require_once 'views/error404.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post_id = $_POST['id'] ?? null;

            if ($post_id) {
                $this->postModel->deletePostById($post_id);
            }
        }

        $this->logModel->log(Action::DeletePost, $_SESSION['admin_id'], 'Deleted a post with ID: '.$post_id);

        header('Location: ' . SITE_URL . '/admin/post');
    }
}