<?php
require_once 'models/ProductModel.php';

class ProductController {
    public function product() {
        $model = new ProductModel();
        $products = $model->getProductList();

        require_once 'views/product_list.php';
    }
}