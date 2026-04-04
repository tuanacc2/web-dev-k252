<?php
class Database {
    private static $instance = null;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "mydbass";
    public $conn;

    private function __construct() {
        try {
            // Kết nối đến MySQL (không chọn database trước)
            $this->conn = new PDO("mysql:host=$this->host", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Kết nối chính thức vào Database vừa tạo
            $this->conn->exec("USE `$this->db` text");

        } catch (PDOException $e) {
            die("Lỗi Database: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}