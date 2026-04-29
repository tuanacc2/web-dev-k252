<?php

class CommentModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getComments($target_id) {
        $query = $this->db->prepare("SELECT * from comments WHERE target_id = ? ORDER BY created_at DESC");
        $query->bindParam("i", $target_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($target_id, $target_type, $user_id, $content) {
        $timestamp = date("Y-m-d H:i:s");
        $query = $this->db->prepare("INSERT INTO comments (user_id, target_id, target_type, content, created_at) VALUES (?, ?, ?, ?, ?)");
        $query->bindParam("iiss", $user_id, $target_id, $target_type, $content, $timestamp);
        return $query->execute();
    }

    public function hideComment($comment_id, $user_id) {
        $query = $this->db->prepare("SELECT * FROM comments WHERE id = ? AND user_id = ?");
        $query->bindParam("ii", $comment_id, $user_id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $hideQuery = $this->db->prepare("UPDATE comments SET hidden = 1 WHERE id = ?");
            $hideQuery->bindParam("i", $comment_id);
            return $hideQuery->execute();
        }

        return false;
    }

    public function deleteComment($comment_id, $user_id) {
        $query = $this->db->prepare("SELECT * FROM comments WHERE id = ? AND user_id = ?");
        $query->bindParam("ii", $comment_id, $user_id);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            $deleteQuery = $this->db->prepare("DELETE FROM comments WHERE id = ?");
            $deleteQuery->bindParam("i", $comment_id);
            return $deleteQuery->execute();
        }

        return false;
    }
}