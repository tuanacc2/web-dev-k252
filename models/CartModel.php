<?php
require_once __DIR__ .'models/ProductModel.php';

class CartModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }
}