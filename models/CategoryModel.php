<?php

class CategoryModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getCategories(string $categoryType = "") {
        if ($categoryType) {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE type = ?");
            $stmt->execute([$categoryType]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $stmt = $this->db->prepare("SELECT * FROM categories");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getCategoryByName(string $name, string $type) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE name = ? AND type = ?");
        $stmt->execute([$name, $type]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoryById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}