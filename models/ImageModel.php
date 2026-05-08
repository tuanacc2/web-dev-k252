<?php
require_once BASE_DIR . '/config/admin/idQuery.php';

enum ImageType: string {
    case Avatar = 'avatar';
    case Product = 'product';
    case Post = 'post';
}


class ImageModel {
    private PDO $db;
    private $allowTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg', 'image/svg+xml'];

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getImageById(int $imageId, ?string $targetType = null): string {
        $stmt = $this->db->prepare("SELECT file_name, target_type FROM images WHERE id = ?");
        $stmt->bindValue(1, $imageId, PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$image) {
            return $this->getDefaultImage($targetType);
        }
        if (!empty($image["file_name"])) {
            return $image["file_name"];
        } else {
            return $this->getDefaultImage($image["target_type"]);
        }
    }

    public function getImageByTargetId(int $targetId, ?string $targetType = null): string {
        $stmt = $this->db->prepare("SELECT file_name, target_type FROM images WHERE target_id = ?");
        $stmt->bindValue(1, $targetId, PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$image) {
            return $this->getDefaultImage($targetType);
        }
        if (!empty($image["file_name"])) {
            return $image["file_name"];
        } else {
            return $this->getDefaultImage($image["target_type"]);
        }
    }

    public function getDefaultImage(string $type): string {
        return match ($type) {
            ImageType::Avatar->value => SITE_URL . "/assets/images/default_user_avatar/avatar1.jpg",
            ImageType::Product->value => SITE_URL . "/assets/images/default_product/product1.jpg",
            ImageType::Post->value => SITE_URL . "/assets/images/default_post/post1.png",
            default => SITE_URL . "/assets/images/default_post/post1.png"
        };
    }

    public function addImage(array $file, int $targetId, string $targetType): int|null {
        $fileName = $this->handleUploadedImage($file, $targetType);
        if (!$fileName) {
            return null;
        }
        $id = IdQuery::getId('images');
        $timestamp = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("INSERT INTO images (id, file_name, target_id, target_type, created_at) VALUES (:id, :file_name, :target_id, :target_type, :created_at)");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':file_name', $fileName, PDO::PARAM_STR);
        $stmt->bindValue(':target_id', $targetId, PDO::PARAM_INT);
        $stmt->bindValue(':target_type', $targetType, PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $timestamp, PDO::PARAM_STR);
        return $stmt->execute() ? $id : null;
    }

    public function handleUploadedImage(array $file, string $targetType = null): ?string {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $tmpName = $file['tmp_name'];
            $originalName = basename($file['name']);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $extension;
            $uploadDir = BASE_DIR . '/assets/uploads/';
            switch ($targetType) {
                case ImageType::Avatar->value:
                    $uploadDir .= 'avatars/';
                    break;
                case ImageType::Product->value:
                    $uploadDir .= 'products/';
                    break;
                case ImageType::Post->value:
                    $uploadDir .= 'posts/';
                    break;
                default:
                    $uploadDir .= 'others/';
            }
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $destination = $uploadDir . $newFileName;
            if (move_uploaded_file($tmpName, $destination)) {
                return SITE_URL . $destination;
            }
        }
        return null;
    }

    public function deleteImage(int $imageId): bool {
        $stmt = $this->db->prepare("DELETE FROM images WHERE id = ?");
        return $stmt->execute([$imageId]);
    }
}