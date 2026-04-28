<?php

class CommentModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getComments($target_id) {
        $query = $this->db->prepare("SELECT * from comments WHERE target_id = ? ORDER BY created_at DESC");
        $query->bind_param("i", $target_id);
        $query->execute();
        return $query->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addComment($target_id, $target_type, $user_id, $content) {
        $timestamp = date("Y-m-d H:i:s");
        $query = $this->db->prepare("INSERT INTO comments (user_id, target_id, target_type, content, created_at) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("iiss", $user_id, $target_id, $target_type, $content, $timestamp);
        return $query->execute();
    }

    public function hideComment($comment_id, $user_id) {
        $query = $this->db->prepare("SELECT * FROM comments WHERE id = ? AND user_id = ?");
        $query->bind_param("ii", $comment_id, $user_id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        if ($result) {
            $hideQuery = $this->db->prepare("UPDATE comments SET hidden = 1 WHERE id = ?");
            $hideQuery->bind_param("i", $comment_id);
            return $hideQuery->execute();
        }

        return false;
    }

    public function deleteComment($comment_id, $user_id) {
        $query = $this->db->prepare("SELECT * FROM comments WHERE id = ? AND user_id = ?");
        $query->bind_param("ii", $comment_id, $user_id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        if ($result) {
            $deleteQuery = $this->db->prepare("DELETE FROM comments WHERE id = ?");
            $deleteQuery->bind_param("i", $comment_id);
            return $deleteQuery->execute();
        }

        return false;
    }
}