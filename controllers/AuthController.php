<?php
require_once 'models/UserModel.php';

class AuthController {
    public function login() {
        require_once 'views/login.php';
    }

    public function register() {
        require_once 'views/register.php';
    }

}