<?php
class ProductModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getProductList(string $value = "") {
        if ($value != "") {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE name LIKE '%".$value."%'");
        } else {
            $stmt = $this->db->prepare("SELECT * FROM products");
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}