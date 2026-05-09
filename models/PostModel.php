<?php

class PostModel {
    private PDO $db;

    public const ALL = 0;
    public const CATEGORIZED = 1;
    public const UNCATEGORIZED = 2;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getPost(string $search = "", ?int $category_id = null, int $categorized = self::ALL, int $limit = 0, int $offset = 0) {
        $sql = "SELECT posts.id, posts.title, posts.thumbnail_id, posts.thumbnail_description, posts.updated_at, categories.name as category, categories.id as category_id, contents.content as content, images.file_name as thumbnail_url, CONCAT(users.last_name, ' ', users.first_name) as author FROM posts 
                LEFT JOIN images ON posts.thumbnail_id = images.id 
                LEFT JOIN categories ON posts.category_id = categories.id 
                LEFT JOIN contents ON posts.content_id = contents.id 
                LEFT JOIN users ON posts.author_id = users.id ";

        if ($search) {
            $sql .= "WHERE title LIKE :search OR thumbnail_description LIKE :search ";
        } else {
            $sql .= "WHERE 1=1 ";
        }

        if ($category_id !== null) {
            $sql .= " AND posts.category_id = :category_id ";
        } elseif ($categorized === 1) {
            $sql .= " AND posts.category_id IS NOT NULL ";
        } elseif ($categorized === 2) {
            $sql .= " AND posts.category_id IS NULL ";
        };

        $sql .= "ORDER BY updated_at DESC ";

        if ($limit) {
            $sql .= "LIMIT :limit OFFSET :offset";
        }

        $stmt = $this->db->prepare($sql);
        
        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }

        if ($category_id !== null) {
            $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        }

        if ($limit > 0) {
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById(int $post_id) {
        $stmt = $this->db->prepare(
            "SELECT posts.*, contents.content, CONCAT(users.last_name, ' ', users.first_name) as author 
            FROM posts 
            LEFT JOIN contents ON posts.content_id = contents.id 
            LEFT JOIN users ON posts.author_id = users.id 
            WHERE posts.id = ?"
        );
        try {
            $stmt->execute([$post_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error or handle it as needed
            return false;
        }
    }

    public function getRecentPosts(int $limit = 3) {
        $stmt = $this->db->prepare(
            "SELECT posts.id, posts.title, posts.thumbnail_description, images.file_name as thumbnail_url, CONCAT(users.last_name, ' ', users.first_name) as author
            FROM posts 
            LEFT JOIN images ON posts.thumbnail_id = images.id 
            LEFT JOIN users ON posts.author_id = users.id 
            WHERE posts.category_id IS NOT NULL
            ORDER BY updated_at DESC 
            LIMIT ?"
        );
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}