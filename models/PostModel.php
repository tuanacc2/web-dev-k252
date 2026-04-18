<?php

class PostModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getPost($search = "") {
        $search_query = $search ? "WHERE title LIKE '%" . $search . "%'" : "";
        $stmt = $this->db->prepare("SELECT * FROM posts " . $search_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($post_id) {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$post_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletePost($post_id=[]) {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id IN (" . implode(',', array_fill(0, count($post_id), '?')) . ")");
        return $stmt->execute($post_id);
    }

    public function deletePostById($post_id) {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$post_id]);
    }

}