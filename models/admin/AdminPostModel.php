    
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
            echo 'Error fetching post. <br>';
            // Log error or handle it as needed
            return false;
        }
    }

    public function addPost(string $title, string $thumbnail_description, int $author_id, string $content, string $category = '', ?int $category_id = null, array $file = []): int | null{
        if (!$title) {
            $_SESSION['error'] = 'Please fill in title field.';
            echo 'Please fill in title field.';
            header('Location: ' . SITE_URL . '/admin/post/add');
            exit();
        }

        try {
            if ($category_id <= 0) {
                $category_id = null;
            } else if (!$category_id && $category) {
                $category_id = ($this->categoryModel->getCategoryByName(name: $category, type: Category::Post)['id'] ?? null);
                if (!$category_id) {
                    $category_id = $this->categoryModel->addCategory(name: $category, description: '', type: Category::Post);
                }
            } else if ($category_id && $category) {
                $existing_category = $this->categoryModel->getCategoryById($category_id);
                if (!$existing_category || $existing_category['name'] !== $category) {
                    $category_id = ($this->categoryModel->getCategoryByName(name: $category, type: Category::Post)['id'] ?? null);
                    if (!$category_id) {
                        $category_id = $this->categoryModel->addCategory(name: $category, description: '', type: Category::Post);
                    }
                }
            } else if (!$category_id && !$category) {
                $category_id = null;
            }

            $post_id = IdQuery::getId('posts');

            $thumbnail_id = null;

            if ($file && $file['tmp_name']) {
                $thumbnail_id = $this->imageModel->addImage($file, $post_id, ImageType::Post);
            }
            
            $query = 
                "INSERT INTO posts (
                    id, 
                    title, 
                    thumbnail_description,"
                    .($thumbnail_id ? "thumbnail_id," : "")."
                    content_id, 
                    author_id"
                    .($category_id ? ", category_id" : "")."
                )
                VALUES (
                    :id, 
                    :title, 
                    :thumbnail_description," 
                    .($thumbnail_id ? ":thumbnail_id," : "")."
                    :content_id,
                    :author_id"
                    .($category_id ? ", :category_id" : "")."
                )"; 

            $content_id = $this->contentModel->addContent($content);

            $stmt = $this->db->prepare($query);

            $excute_array = [
                ":id" => $post_id,
                ":title" => $title,
                ":thumbnail_description" => $thumbnail_description,
            ] + ($thumbnail_id ? [":thumbnail_id" => $thumbnail_id] : []) + [
                ":content_id" => $content_id,
            ] + [
                ":author_id" => $author_id,
            ] + ($category_id ? [":category_id" => $category_id] : []);
            $stmt->execute($excute_array);
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Can\'t add post. Error: ' . $e->getMessage();
            echo 'Can\'t add post. <br>';
            exit();

        }    

        return $post_id;
    }

    public function updatePost(int $post_id, string $title, string $thumbnail_description, string $content, string $category = '', ?int $category_id = null, array $file = [], bool $removeThumbnail = false): bool {
        $success = true;
    
        if (!$title) {
            $_SESSION['error'] = 'Please fill in all required fields.';
            echo 'Please fill in title field.';
            header('Location: ' . SITE_URL . '/admin/post/add');
            exit();
        }
    
        try {
            if ($category_id <= 0) {
                $category_id = null;
            } else if (!$category_id && $category) {
                $category_id = ($this->categoryModel->getCategoryByName(name: $category, type: Category::Post)['id'] ?? null);
                if (!$category_id) {
                    $category_id = $this->categoryModel->addCategory(name: $category, description: '', type: Category::Post);
                }
            } else if ($category_id && $category) {
                $existing_category = $this->categoryModel->getCategoryById($category_id);
                if (!$existing_category || $existing_category['name'] !== $category) {
                    $category_id = ($this->categoryModel->getCategoryByName(name: $category, type: Category::Post)['id'] ?? null);
                    if (!$category_id) {
                        $category_id = $this->categoryModel->addCategory(name: $category, description: '', type: Category::Post);
                    }
                }
            } else if (!$category_id && !$category) {
                $category_id = null;
            }

            $post = $this->getPostById($post_id);

            // Get the old thumbnail ID before updating the post
            $old_thumbnail_id = $post['thumbnail_id'] ?? null;
    
            if (!$post) {
                return false;
            }

            $thumbnail_id = null;

            // Add new thumbnail if a new file is uploaded
            if ($file && $file['tmp_name']) {
                $thumbnail_id = $this->imageModel->addImage($file, $post_id, ImageType::Post);
            } 

            if ($thumbnail_id || (!$thumbnail_id && $removeThumbnail)) {
                // If thumbnail is removed (no new file and thumbnail_id is null), delete the old thumbnail
                $removeThumbnail = true;
            }  

            $thumbnail_id = $thumbnail_id ?? $old_thumbnail_id;

            // Update post content
            $this->contentModel->updateContent($post['content_id'], $content);

            $query = 
                "UPDATE posts SET
                    title = :title, 
                    thumbnail_description = :thumbnail_description,
                    thumbnail_id = :thumbnail_id,
                    category_id = :category_id
                WHERE id = :id"; 

            $stmt = $this->db->prepare($query);

            $excute_array = [
                ":id" => $post_id,
                ":title" => $title,
                ":thumbnail_description" => $thumbnail_description,
                ":thumbnail_id" => $thumbnail_id,
                ":category_id" => $category_id
            ];

            $success = $stmt->execute($excute_array);

            if ($removeThumbnail) {
                // If thumbnail is removed (no new file and thumbnail_id is null), delete the old thumbnail
                if ($old_thumbnail_id) {
                    $this->imageModel->deleteImage($old_thumbnail_id);
                }
            }   
            
        } catch (PDOException $e) {
            echo 'Error updating post. <br>';
            // Log error or handle it as needed
            $success = false;
        }

        return $success;
    }

    public function deletePostById(int $post_id) {
        $result = true;

        try {
            $post = $this->getPostById($post_id);

            $this->contentModel->deleteContent((int) $post['content_id']);
            $this->imageModel->deleteImage((int) $post['thumbnail_id']);

            $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");$post = $this->getPostById($post_id);

            $this->contentModel->deleteContent((int) $post['content_id']);
            $this->imageModel->deleteImage((int) $post['thumbnail_id']);

            $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
            $result = $stmt->execute([$post_id]);

        } catch (PDOException $e) {
            echo 'Error deleting post. <br>';
            // Log error or handle it as needed
            return false;
        }
        
        return $result;
    }
}