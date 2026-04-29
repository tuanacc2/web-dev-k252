<?php
class HomeController {

    public function home() {
        require_once 'views/homepage.php';
    }

    public function about() {
        require_once 'views/about.php';
    }

    public function help() {
        require_once 'views/help.php';
    }

    public function dashboard() {
        require_once 'views/dashboard.php';
    }
}