<?php
require_once BASE_DIR .'/models/ProductModel.php';

class ProductController {
    private AuditLoggerModel $logModel;
    private ProductModel $productModel;

    public function __construct() {
        $this->logModel = new AuditLoggerModel();
        $this->productModel = new ProductModel();
    }

    public function products() {
        $products = $this->productModel->getProduct();

        require_once 'views/products.php';
    }

    public function productDetail(int $product_id) {
        $product = $this->productModel->getProductById($product_id);

        require_once 'views/productDetail.php';
    }
}