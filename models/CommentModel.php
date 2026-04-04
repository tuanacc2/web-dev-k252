<?php

class CommentModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }
}