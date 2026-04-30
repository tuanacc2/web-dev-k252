<?php
class ProductModel {
    private \PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getProducts(string $keyword = "", int $limit = 10, int $offset = 0) {
        $search_query = $keyword ? 
            "WHERE name LIKE '%" . $keyword . "%'" : "";
        $stmt = $this->db->prepare("SELECT * FROM products ".$search_query." ORDER BY id DESC LIMIT :limit OFFSET :offset");
        $stmt->execute([
            ":limit" => $limit,
            ":offset" => $offset
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById(int $id) {   
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bindParam("i", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}