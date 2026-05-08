    
<?php
require_once BASE_DIR . '/config/admin/idQuery.php';
require_once BASE_DIR . '/models/admin/AdminContentModel.php';
require_once BASE_DIR . '/models/admin/AdminCategoryModel.php';
require_once BASE_DIR . '/models/ImageModel.php';

class AdminPostModel {
    private PDO $db;

    private AdminContentModel $contentModel;
    private AdminCategoryModel $categoryModel;
    private ImageModel $imageModel;

    public function __construct() {
        $this->db = Database::getInstance()->conn;

        $this->contentModel = new AdminContentModel();
        $this->categoryModel = new AdminCategoryModel();
        $this->imageModel = new ImageModel();
    }

    public function getPostById(int $post_id) {
        $stmt = $this->db->prepare(
            "SELECT posts.*, contents.content, CONCAT(users.last_name, ' ', users.first_name) as author 
            FROM posts 
            LEFT JOIN contents ON posts.content_id = contents.id 
            LEFT JOIN users ON posts.author_id = users.id 
            WHERE posts.id = ?"
        );
        try {
            $stmt->execute([$post_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error or handle it as needed
            return false;
        }
    }

    public function addPost(string $title, string $thumbnail_description, int $author_id, string $content, string $categoryType = '', array $file = []) {
        if (!$title) {
            $_SESSION['error'] = 'Please fill in all required fields.';
            header('Location: ' . SITE_URL . 'admin/post/add');
            exit();
        }

        $post_id = IdQuery::getId('posts');

        $thumbnail_id = null;

        if ($file && $file['tmp_name']) {
            $thumbnail_id = $this->imageModel->addImage($file, $post_id, ImageType::Post);
            if ($thumbnail_id) {
                $stmt = $this->db->prepare("UPDATE posts SET thumbnail_id = ? WHERE id = ?");
                $stmt->execute([$thumbnail_id, $post_id]);
            }
        }
        
        $category_id = ($this->categoryModel->getCategoryByName($name = $categoryType, $type = 'post')['id'] ?? null);
        if ($categoryType && !$category_id) {
            $category_id = $this->categoryModel->addCategory($name = $categoryType, $description = '', $type = 'post');
        }
        $content_id = $this->contentModel->addContent($content);

        if ($file && $file['tmp_name']) {
            $thumbnail_id = $this->imageModel->addImage($file, $post_id, ImageType::Post);
        }

        // Ensure content was added successfully before adding the post
        try {
            $stmt = $this->db->prepare("INSERT INTO posts (id, title, thumbnail_description, thumbnail_id, content_id, author_id, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$post_id, $title, $thumbnail_description, $thumbnail_id, $content_id, $author_id, $category_id]);
        }
        catch (PDOException $e) {
            // Log error or handle it as needed
            return false;
        }

    }

    public function updatePost(int $post_id, string $title, string $thumbnail_description, string $content, string $categoryType = '', array $file = []) {
        $category_id = ($this->categoryModel->getCategoryByName($name = $categoryType, $type = 'post')['id'] ?? null);
        if ($categoryType && !$category_id) {
            $category_id = $this->categoryModel->addCategory($name = $categoryType, $description = '', $type = 'post');
        }

        // Get the old thumbnail ID before updating the post
        $old_thumbnail_id = $this->getPostById($post_id)['thumbnail_id'] ?? null;

        $post = $this->getPostById($post_id);
        if (!$post) {
            return false;
        }

        $thumbnail_id = null;

        // Add new thumbnail if a new file is uploaded
        if ($file && $file['tmp_name']) {
            $thumbnail_id = $this->imageModel->addImage($file, $post_id, ImageType::Post);
        }

        // Update post content
        $this->contentModel->updateContent($post['content_id'], $content);
        $stmt = $this->db->prepare("UPDATE posts SET title = ?, thumbnail_description = ?". ($thumbnail_id ? ", thumbnail_id = ?" : "") .", category_id = ? WHERE id = ?");
        $flag = $stmt->execute([$title, $thumbnail_description] + ($thumbnail_id ? [$thumbnail_id] : []) + [$category_id, $post_id]);

        // If a new thumbnail was uploaded and the post had an old thumbnail, delete the old thumbnail
        if ($old_thumbnail_id && $old_thumbnail_id != $thumbnail_id) {
            $this->imageModel->deleteImage($old_thumbnail_id);
        }

        return $flag;
    }

    public function deletePost(array $post_id=[]) {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id IN (" . implode(',', array_fill(0, count($post_id), '?')) . ")");
        return $stmt->execute($post_id);
    }

    public function deletePostById(int $post_id) {
        $post = $this->getPostById($post_id);

        $this->contentModel->deleteContent($post['content_id']);
        $this->imageModel->deleteImage($post['thumbnail_id']);

        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$post_id]);
    }
}