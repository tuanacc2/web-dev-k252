<?php
require_once BASE_DIR . '/config/admin/idQuery.php';

enum Action: string {
    case Login = 'LOGIN';
    case Logout = 'LOGOUT';
    case Register = 'REGISTER';
    case AddPost = 'ADD_POST';
    case UpdatePost = 'UPDATE_POST';
    case HidePost = 'HIDE_POST';
    case DeletePost = 'DELETE_POST';
    case AddCategory = 'ADD_CATEGORY';
    case UpdateCategory = 'UPDATE_CATEGORY';
    case DeleteCategory = 'DELETE_CATEGORY';
    case Comment = 'COMMENT';
    case HideComment = 'HIDE_COMMENT';
    case DeleteComment = 'DELETE_COMMENT';
    case AddProduct = 'ADD_PRODUCT';
    case UpdateProduct = 'UPDATE_PRODUCT';
    case DeleteProduct = 'DELETE_PRODUCT';
    case AddImage = 'ADD_IMAGE';
    case DeleteImage = 'DELETE_IMAGE';
    case Purchase = 'PURCHASE';
    case AddtoCart = 'ADD_TO_CART';
}

class AuditLoggerModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function log(Action $action, ?int $user_id = null, string $description = "", ?int $target_id = null) {
        $timestamp = date("Y-m-d H:i:s");
        $id = IdQuery::getId('logs');
        $stmt = $this->db->prepare("INSERT INTO logs (id, user_id, action, target_id, description, created_at) VALUES (:id, :user_id, :action, :target_id, :description, :created_at)");
        $stmt->execute([
            ':id' => $id,
            ':user_id'   => $user_id,
            ':action'    => $action->value,
            ':target_id' => $target_id,
            ':description' => $description,
            ':created_at'=> $timestamp
        ]);
    }

    public function getLogs(string $search = "", int $limit = 0, int $offset = 0) {
        $sql = "
            SELECT l.*, u.username
            FROM logs l
            LEFT JOIN users u ON l.user_id = u.id 
        ";

        if (!empty($search)) {
            $sql .= " WHERE u.username LIKE :search OR l.description LIKE :search OR l.action LIKE :search";
        }

        $sql .= " ORDER BY l.id DESC";

        if ($limit > 0) {
            $sql .= " LIMIT :limit OFFSET :offset";
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

    public function getLogById(int $log_id) {
        $stmt = $this->db->prepare("SELECT * FROM logs WHERE id = ?");
        $stmt->bindParam("i", $log_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}