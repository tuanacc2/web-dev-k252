<?php
require_once BASE_DIR . '/config/admin/idQuery.php';

class AdminContentModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getContentById(int $content_id) {
        $stmt = $this->db->prepare("SELECT * FROM contents WHERE id = ?");
        $stmt->execute([$content_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addContent(string $content) {
        $id = IdQuery::getId('contents');
        $stmt = $this->db->prepare("INSERT INTO contents (id, content) VALUES (?, ?)");
        return $stmt->execute([$id, $content]) ? $id : false;
    }

    public function updateContent(int $id, string $content) {
        $stmt = $this->db->prepare("UPDATE contents SET content = ? WHERE id = ?");
        return $stmt->execute([$content, $id]);
    }

    public function deleteContent(int $content_id) {
        $stmt = $this->db->prepare("DELETE FROM contents WHERE id = ?");
        return $stmt->execute([$content_id]);
    }
}