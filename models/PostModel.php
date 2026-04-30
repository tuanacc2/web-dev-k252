<?php

class PostModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getPost(string $search = "", int $limit = 10, int $offset = 0) {
        $search_query = $search ? 
            "WHERE title LIKE '%" . $search . "%' ORDER BY created_at DESC LIMIT :limit OFFSET :offset" : 
            "ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare("SELECT * FROM posts " . $search_query);
        $stmt->execute([
            ":limit" => $limit,
            ":offset" => $offset
        ]);
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