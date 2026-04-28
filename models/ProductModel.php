<?php
class ProductModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getProducts(string $value = "") {
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
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}