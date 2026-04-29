<?php
class UserModel {
    private \PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getUserById(int $id) {
        $stmt = $this->db->prepare("SELECT id, username, email, phoneNumber, avatar_id, address, created_at FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}