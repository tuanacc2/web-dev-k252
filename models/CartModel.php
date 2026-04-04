<?php
require_once 'models/ProductModel.php';

class CartModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }
}