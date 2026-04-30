<?php
class AdminUserModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAllUsers(int $limit = 20, int $offset = 0) {
        $stmt = $this->db->prepare("SELECT * FROM users ORDER BY id ASC LIMIT :limit OFFSET :offset");
        $stmt->execute([
            ":limit" => $limit,
            ":offset" => $offset
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteUsers(array $user_id=[]) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id IN (" . implode(',', array_fill(0, count($user_id), '?')) . ")");
        $stmt->execute($user_id);  
    }

    public function deleteUserById(int $id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}