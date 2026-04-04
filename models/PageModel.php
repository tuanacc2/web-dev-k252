<?php

class PageModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }
}