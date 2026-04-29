<?php
class Database {
    private static $instance = null;

    private $host = "127.0.0.1";
    private $port = "3307";
    private $user = "root";
    private $pass = "";
    private $db   = "ecommerce";

    public $conn;

    private function __construct() {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port}";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // chọn database
            $this->conn->exec("USE `{$this->db}`");
            // LOG thành công ra terminal
            error_log("[DB] Connected successfully to {$this->db} on port {$this->port}");
        } catch (PDOException $e) {
            error_log("[DB ERROR] " . $e->getMessage());
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