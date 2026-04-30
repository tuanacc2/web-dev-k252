<?php
require_once BASE_DIR .'/models/CartModel.php';

class AdminCartController {
    private ProductModel $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function products() {
        $products = $this->productModel->getProduct();

        require_once 'views/admin/cart.php';
    }
}