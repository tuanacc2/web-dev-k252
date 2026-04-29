<?php
class ProductModel {
    private \PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getProduct(string $value = "") {
        if ($value != "") {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE name LIKE '%".$value."%'");
        } else {
            $stmt = $this->db->prepare("SELECT * FROM products");
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById(int $id) {   
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bindParam("i", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}