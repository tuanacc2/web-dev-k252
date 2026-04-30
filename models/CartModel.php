<?php

class CartModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getCartByUserId(int $userId, int $limit = 20, int $offset = 0) {
        $stmt = $this->db->prepare("
            SELECT c.*, p.name, p.price, p.image_id 
            FROM cart c 
            JOIN products p ON c.product_id = p.id 
            WHERE c.user_id = :user_id
            ORDER BY c.id DESC LIMIT :limit OFFSET :offset
        ");
        $stmt->execute([
            ":user_id" => $userId,
            ":limit" => $limit,
            ":offset" => $offset
            ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProductToCart(int $userId, int $productId, int $quantity = 1) {
        $stmt = $this->db->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ? ASC LIMIT :limit OFFSET :offset");
        $stmt->execute([$userId, $productId]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            $newQty = $existing['quantity'] + $quantity;
            $update = $this->db->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
            return $update->execute([$newQty, $existing['id']]);
        } else {
            $insert = $this->db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
            return $insert->execute([$userId, $productId, $quantity]);
        }
    }
}