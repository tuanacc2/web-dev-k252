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

    public function addNewUser(string $username, string $password, string $first_name, string $last_name, string $email, string $phone, string $address) {
        $stmt = $this->db->prepare("INSERT INTO users (username, password, first_name, last_name, email, phoneNumber, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $success = $stmt->execute([$username, $password, $first_name, $last_name, $email, $phone, $address]);
        if ($success) {
            return (int)$this->db->lastInsertId();
        }
        return false;
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

    public function updatePasswordHashById(int $id, string $hashedPassword): bool {
        $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");
        return $stmt->execute([$hashedPassword, $id]);
    }

}