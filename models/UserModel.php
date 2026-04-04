<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}