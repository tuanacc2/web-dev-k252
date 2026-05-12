<?php
require_once BASE_DIR.'/models/ImageModel.php';

class AdminUserModel {
    private PDO $db;
    private ImageModel $imageModel;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
        $this->imageModel = new ImageModel();
    }

    public function getAllUsers(int $limit = 0, int $offset = 0) {
        $stmt = $this->db->prepare(
            "SELECT users.*, images.file_name as avatar_url 
            FROM users 
            LEFT JOIN images ON users.avatar_id = images.id 
            ORDER BY id ASC "
            . ($limit ? "LIMIT :limit OFFSET :offset" : "")
        );
        $execute_array = $limit ? [
            ":limit" => $limit,
            ":offset" => $offset
        ] : [];
        $stmt->execute($execute_array);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById(int $id) {
        $stmt = $this->db->prepare(
            "SELECT users.*, images.file_name as avatar_url 
            FROM users 
            LEFT JOIN images ON users.avatar_id = images.id  
            WHERE users.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addAdmin(string $username, string $password, string $firstName, string $lastName,  string $email, string $phone, string $address = '', array $file = []) {
        $id = IdQuery::getId('users');
        $avatar_id = $this->imageModel->addImage($file, $id, ImageType::Avatar);
        $stmt = $this->db->prepare("INSERT INTO users (id, username, last_name, first_name, password, email, phoneNumber, address, role, avatar_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$id, $username, $lastName, $firstName, $password, $email, $phone, $address, 'admin', $avatar_id]);
        return $id;
    }

    public function updateUser(int $id, string $password, string $firstName, string $lastName,  string $email, string $phone, string $address = '', array $file = [], bool $removeAvatar = false) {
        $success = true;
    
        try {

            $user = $this->getUserById($id);

            // Get the old thumbnail ID before updating the post
            $old_avatar_id = $user['avatar_id'] ?? null;

            
            if (!$user) {
                return false;
            }

            $avatar_id = null;

            // Add new thumbnail if a new file is uploaded
            if ($file && $file['tmp_name']) {
                $avatar_id = $this->imageModel->addImage($file, $id, ImageType::Avatar);
            } 

            if ($avatar_id || (!$avatar_id && $removeAvatar)) {
                // If thumbnail is removed (no new file and thumbnail_id is null), delete the old thumbnail
                $removeAvatar = true;
            }  

            $avatar_id = $avatar_id ?? $old_avatar_id;

            $query = 
                "UPDATE users SET
                    last_name = :lastname, 
                    first_name = :firstname, 
                    ".($password ? "password = :password," : "")."
                    email = :email, 
                    phoneNumber = :phone, 
                    address = :address, 
                    avatar_id = :avatar_id
                WHERE id = :id"; 

            $stmt = $this->db->prepare($query);

            $excute_array = [
                ":id" => $id,
                ":lastname" => $lastName,
                ":firstname" => $firstName
            ] + ($password ? [":password" => $password] : [
            ]) + [
                ":email" => $email,
                ":phone" => $phone,
                ":address" => $address,
                ":avatar_id" => $avatar_id
            ];


            $success = $stmt->execute($excute_array);

            if ($removeAvatar) {
                // If thumbnail is removed (no new file and thumbnail_id is null), delete the old thumbnail
                if ($old_avatar_id) {
                    $this->imageModel->deleteImage($old_avatar_id);
                }
            }   
            
        } catch (PDOException $e) {
            echo 'Error updating post. <br>';
            // Log error or handle it as needed
            $success = false;
        }

        return $success;
    }

    public function updateStatus(int $id, bool $restricted, int $hour) {
        $stmt = $this->db->prepare("UPDATE users SET restricted = ?, timeout = ? WHERE id = ?");
        $timestamp = date("Y-m-d H:i:s", strtotime('+'.(string)$hour.' hour'));
        return $stmt->execute([$restricted, $timestamp, $id]);
    }

    public function deleteUserById(int $id) {
        if ($id === 1) return false;
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}