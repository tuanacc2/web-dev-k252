<?php
require_once BASE_DIR . '/config/admin/idQuery.php';

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

    public function isEmailTaken(string $email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function isPhoneTaken(string $phone) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE phoneNumber = ?");
        $stmt->execute([$phone]);
        return $stmt->fetchColumn() > 0;
    }

    public function addNewUser(string $username, string $lastname, string $firstname, string $email, string $password, string $phone, string $address = '') {
        $id = IdQuery::getId('users');
        $stmt = $this->db->prepare("INSERT INTO users (id, username, last_name, first_name, password, email, phoneNumber, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$id, $username, $lastname, $firstname, $password, $email, $phone, $address]);
        return $id;
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