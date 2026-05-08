<?php

class MainProductModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM main_products ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM main_products WHERE id = :id LIMIT 1");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(array $data): bool {
        $stmt = $this->db->prepare(
            "INSERT INTO main_products (title, image, description) VALUES (:title, :image, :description)"
        );
        $stmt->bindValue(':title', $data['title'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':image', $data['image'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'] ?? '', PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateById(int $id, array $data): bool {
        $stmt = $this->db->prepare(
            "UPDATE main_products SET title = :title, image = :image, description = :description WHERE id = :id"
        );
        $stmt->bindValue(':title', $data['title'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':image', $data['image'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteById(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM main_products WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}