<?php
class AuthModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function isUsernameTaken(string $username) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetchColumn() > 0;
    }

    public function addNewUser(string $username, string $email, string $password, string $phone, string $address) {
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password, phoneNumber, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $phone, $address]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername(string $username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}