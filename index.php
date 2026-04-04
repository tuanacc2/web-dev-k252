<?php
session_start();
require_once 'core/Database.php';
require_once 'controllers/UserController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/PostController.php';

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'login':
        (new AuthController())->login();
        break;
    case 'product':
        (new ProductController())->listOfProduct();
        break;
    case 'help':
        (new HomeController())->help();
        break;
    case 'logout':
        session_destroy();
        header("Location: index.php");
        break;
    default:
        (new HomeController())->home();
        break;
}