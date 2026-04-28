<?php
class HomeController {
    public function home() {
        require_once 'views/homepage.php';
    }

    public function about() {
        require_once 'views/about.php';
    }

    public function contact() {
        require_once 'views/contact.php';
    }

    public function help() {
        require_once 'views/help.php';
    }
}