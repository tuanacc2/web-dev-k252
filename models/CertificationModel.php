<?php

class CertificationModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM certifications ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM certifications WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $certification = $stmt->fetch(PDO::FETCH_ASSOC);
        return $certification ?: null;
    }

    public function create(array $data): bool {
        $stmt = $this->db->prepare(
            "INSERT INTO certifications (logo, title, subtitle, content)
             VALUES (:logo, :title, :subtitle, :content)"
        );
        $stmt->bindValue(':logo', $data['logo'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':title', $data['title'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':subtitle', $data['subtitle'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':content', $data['content'] ?? null, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateById(int $id, array $data): bool {
        $stmt = $this->db->prepare(
            "UPDATE certifications
             SET logo = :logo,
                 title = :title,
                 subtitle = :subtitle,
                 content = :content
             WHERE id = :id"
        );
        $stmt->bindValue(':logo', $data['logo'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':title', $data['title'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':subtitle', $data['subtitle'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':content', $data['content'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteById(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM certifications WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}