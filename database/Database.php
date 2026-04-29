<?php
class Database {
    private static ?Database $instance = null;
    private string $host = "localhost";
    private string $port = "";
    private string $user = "root";
    private string $pass = "";
    private string $db   = "mydbass";
    public PDO|null $conn;

    private function __construct() {
        try {
            // Kết nối đến MySQL (không chọn database trước)
            $port_dsn = $this->port ? ";port={$this->port}" : "";
            $this->conn = new PDO("mysql:host=$this->host" . $port_dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // chọn database
            $this->conn->exec("USE `{$this->db}`");
            // LOG thành công ra terminal
            error_log("[DB] Connected successfully to {$this->db} on port {$this->port}");
        } catch (PDOException $e) {
            error_log("[DB ERROR] " . $e->getMessage());
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