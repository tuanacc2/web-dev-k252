<?php
require_once 'models/ProductModel.php';

class ProductController {
    public function product() {
        $products = (new ProductModel())->getProducts();

        require_once 'views/products.php';
    }
}