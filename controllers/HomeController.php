<?php
class HomeController {

    public function home() {
        require_once __DIR__ . '/../views/homepage.php';
    }

    public function about() {
        require_once __DIR__ . '/../views/about.php';
    }

    public function help() {
        require_once __DIR__ . '/../views/help.php';
    }
}