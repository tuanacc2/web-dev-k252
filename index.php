<?php
require_once __DIR__ . '/config/session_init.php';
require_once __DIR__ . '/database/Database.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/PostController.php';
require_once __DIR__ . '/controllers/ContactController.php';
enum Page: string {
    case Home = 'homepage';
    case Login = 'auth/login';
    case Logout = 'auth/logout';
    case Register = 'auth/register';
    case Dashboard = 'dashboard';
    case Profile = 'profile';
    case Setting = 'setting';
    case Posts = 'posts';
    case Products = 'products';
    case ContactStore  = 'contact_store';
    case ContactCreate = 'contact_create';


    public static function isValid(string $name): bool {
        foreach (self::cases() as $case) {
            if ($case->value === $name) {
                return true;
            }
        }
        return false;
    }
}

$action = $_GET['action'] ?? Page::Home->value;

$page = Page::tryFrom($action);

if (!$page || !Page::isValid($action)) {
    global $base_url;
    header("Location: $base_url/");
    exit();
}

match($page) {
    Page::Home      => (new HomeController())->home(),
    Page::Login     => (new AuthController())->login(),
    Page::Logout    => (new AuthController())->logout(),
    Page::Register  => (new AuthController())->register(),
    Page::Dashboard => (new HomeController())->home(),
    Page::Profile   => (new UserController())->profile(),
    Page::Posts     => (new PostController())->listPosts(),
    Page::Products  => (new ProductController())->product(),
    // CONTACT
    Page::ContactStore  => (new ContactController())->store(),
    default         => (new HomeController())->home(),
};
