<?php

class PostModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getPost(string $search = "", int $limit = 0, int $offset = 0) {
        $sql = "SELECT * FROM posts ";

        if ($search) {
            $sql .= "WHERE title LIKE :search ";
        }

        $sql .= "ORDER BY created_at DESC ";

        if ($limit) {
            $sql .= "LIMIT :limit OFFSET :offset";
        }

        $stmt = $this->db->prepare($sql);
        
        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }

        if ($limit > 0) {
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById(int $post_id) {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$post_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletePost(array $post_id=[]) {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id IN (" . implode(',', array_fill(0, count($post_id), '?')) . ")");
        return $stmt->execute($post_id);
    }

    public function deletePostById(int $post_id) {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$post_id]);
    }

}