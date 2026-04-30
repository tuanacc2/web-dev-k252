<?php
require_once BASE_DIR .'/models/CartModel.php';

class CartController {
    private AuditLoggerModel $logModel;
    private CartModel $cartModel;

    public function __construct() {
        $this->logModel = new AuditLoggerModel();
        $this->cartModel = new CartModel();
    }

    public function cart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
            } catch (Exception $e) {
                $error_message = "An error occurred during the process. Please try again. ". $e->getMessage();
            }              
        } else {
            $cart = $this->cartModel->getCartByUserId($_SESSION["user_id"]);

            require_once 'views/productCart.php';
        }
    }
}