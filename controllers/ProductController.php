<?php
require_once 'models/ProductModel.php';

class ProductController {
    public function productList() {
        $model = new ProductModel();
        $users = $model->getProductList();

        require_once 'views/product_list.php';
    }
}