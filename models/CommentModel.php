<?php

class CommentModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getComments(int $target_id, int $limit = 20, int $offset = 0) {
        $stmt = $this->db->prepare("SELECT * from comments WHERE target_id = ? ORDER BY created_at ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam("i", $target_id);
        $stmt->execute([
            ":limit" => $limit,
            ":offset" => $offset
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment(int $targetId, string $targetType, int $userId, string $content) {
        $timestamp = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("INSERT INTO comments (user_id, target_id, target_type, content, created_at) VALUES (:user_id, :target_id, :target_type, :content, :created_at)");
        return $stmt->execute([
            ":user_id" => $userId,
            ":target_id" => $targetId,
            ":target_type" => $targetType,
            ":content" => $content,
            ":created_at" => $timestamp
        ]);
    }

    public function hideComment(int $comment_id, int $user_id) {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE id = ? AND user_id = ?");
        $stmt->bindParam("ii", $comment_id, $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $hideQuery = $this->db->prepare("UPDATE comments SET hidden = 1 WHERE id = ?");
            $hideQuery->bindParam("i", $comment_id);
            return $hideQuery->execute();
        }

        return false;
    }

    public function deleteComment(int $comment_id, int $user_id) {
        $query = $this->db->prepare("SELECT * FROM comments WHERE id = ? AND user_id = ?");
        $query->bindParam("ii", $comment_id, $user_id);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            $deleteStmt = $this->db->prepare("DELETE FROM comments WHERE id = ?");
            $deleteStmt->bindParam("i", $comment_id);
            return $deleteStmt->execute();
        }

        return false;
    }
}