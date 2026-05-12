<?php
class ProductModel {
    private \PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getProducts(string $search = "", int $limit = 0, int $offset = 0) {
        $search_query = $search ? "WHERE name LIKE :search " : "";
        $stmt = $this->db->prepare("SELECT * FROM products ".$search_query." ORDER BY id DESC ". ($limit ? "LIMIT :limit OFFSET :offset" : ""));
        $execute_array = (
            $search ? [
            ":search" => $search
        ] : []) 
            + ($limit ? [
            ":limit" => $limit,
            ":offset" => $offset
        ] : []);
        $stmt->execute($execute_array);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById(int $id) {   
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bindParam("i", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}