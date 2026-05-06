<?php

class ScrollTextModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM scrolltext ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateContent(int $id, string $content): bool {
        $stmt = $this->db->prepare("UPDATE scrolltext SET content = :content WHERE id = :id");
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}