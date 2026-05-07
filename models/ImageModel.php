<?php

enum ImageType: string {
    case Avatar = 'avatar';
    case Product = 'product';
    case Post = 'post';
    case Advertisement = 'advertisement';
    case Certification = 'certification';
    case MainProduct = 'main_product';
    case Information = 'information';
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

    private function getDefaultImage(string $type): string {
        return match ($type) {
            ImageType::Avatar->value => SITE_URL . "/assets/images/default_user_avatar/avatar1.jpg",
            ImageType::Product->value => SITE_URL . "/assets/images/default_product/product1.jpg",
            ImageType::Post->value => SITE_URL . "/assets/images/default_post/post1.png",
            ImageType::MainProduct->value => SITE_URL . "/assets/images/default_product/product1.jpg",
            ImageType::Information->value => SITE_URL . "/assets/images/default_post/post1.png",
            default => SITE_URL . "/assets/images/default_post/post1.png"
        };
    }
    private function getUploadDir(ImageType $type): string {
        return match ($type) {
            ImageType::Avatar => "assets/upload/avatars/",
            ImageType::Product => "assets/upload/products/",
            ImageType::Post => "assets/upload/posts/",
            ImageType::Advertisement => "assets/upload/advertisements/",
            ImageType::Certification => "assets/upload/certifications/",
            ImageType::MainProduct => "assets/upload/main_products/",
            ImageType::Information => "assets/upload/informations/",
        };
    }

    public function addImage(string $fileName, int $targetId, int $targetType) {
        $timestamp = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("INSERT INTO images (file_name, target_id, target_type, created_at) VALUES (:file_name, :target_id, :target_type, :created_at)");
        $stmt->bindValue(':file_name', $fileName, PDO::PARAM_STR);
        $stmt->bindValue(':target_id', $targetId, PDO::PARAM_INT);
        $stmt->bindValue(':target_type', $targetType, PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $timestamp, PDO::PARAM_STR);
        return $stmt->execute();
    }


    public function uploadImage(array $file, ImageType $type): string {
        $uploadDir = $this->getUploadDir($type);
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException("Upload error");
        }
        $tmpName = $file['tmp_name'] ?? '';
        if ($tmpName === '') {
            throw new RuntimeException("Missing temp file");
        }
        $mime = mime_content_type($tmpName);
        if (!in_array($mime, $this->allowTypes, true)) {
            throw new InvalidArgumentException("Invalid file type: $mime");
        }
        $originalName = $file['name'] ?? '';
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $fileName = bin2hex(random_bytes(16)) . ($extension !== '' ? '.' . $extension : '');
        $destination = $uploadDir . $fileName;
        if (!move_uploaded_file($tmpName, $destination)) {
            throw new RuntimeException("Failed to move file");
        }
        return '/' . ltrim($destination, '/');
    }

        
}