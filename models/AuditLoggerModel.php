<?php

enum Action: string {
    case Login = 'LOGIN';
    case Logout = 'LOGOUT';
    case Register = 'REGISTER';
    case Dashboard = 'DASHBOARD';
    case AddPost = 'ADD_POST';
    case EditPost = 'EDIT_POST';
    case DeletePost = 'DELETE_POST';
    case Comment = 'COMMENT';
    case DeleteComment = 'DELETE_COMMENT';
    case AddProduct = 'ADD_PRODUCT';
    case EditProduct = 'EDIT_PRODUCT';
    case DeleteProduct = 'DELETE_PRODUCT';
    case Purchase = 'PURCHASE';
    case AddtoCart = 'ADD_TO_CART';
}

class AuditLoggerModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function log($action, $user_id = null, $description = "", $target_id = null) {
        $timestamp = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("INSERT INTO logs (user_id, action, target_id, description, created_at) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issiis", $user_id, $action, $target_id, $description, $timestamp);
        $stmt->execute();
    }

    public function getLog($keyword = "") {
        $sql = "SELECT * FROM logs";
        if (!empty($keyword)) {
            $sql .= " WHERE * LIKE ?";
            $stmt = $this->db->prepare($sql);
            $like_keyword = "%$keyword%";
            $stmt->bind_param("s", $like_keyword);
        } else {
            $stmt = $this->db->prepare($sql);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getLogById($log_id) {
        $stmt = $this->db->prepare("SELECT * FROM logs WHERE id = ?");
        $stmt->bind_param("i", $log_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}