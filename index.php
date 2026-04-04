<?php
session_start();
require_once __DIR__ . '/database/Database.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/PostController.php';

$action = $_GET['action'] ?? 'homepage';

switch ($action) {
    case 'user':
        (new UserController())->info();
        break;
    case 'product':
        (new ProductController())->product();
        break;
    case 'logout':
        session_destroy();
        header("Location: index.php");
        exit();
    default:
        (new HomeController())->home();
        break;
}