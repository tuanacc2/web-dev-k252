<?php

class LogModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }
}