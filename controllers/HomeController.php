<?php
class HomeController {

    public function home() {
        global $base_url;
        require_once 'views/homepage.php';
    }

    public function about() {
        global $base_url;
        require_once 'views/about.php';
    }

    public function help() {
        global $base_url;
        require_once 'views/help.php';
    }

    public function dashboard() {
        global $base_url;
        require_once 'views/dashboard.php';
    }
}