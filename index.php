<?php
define('BASE_DIR', __DIR__);

$scriptPath = $_SERVER['SCRIPT_NAME'];
$pathArray = explode('/', $scriptPath);
$webRoot = '';
if (count($pathArray) > 1) {
    array_pop($pathArray);
    $webRoot = implode('/', $pathArray);
} else {
    $webRoot = '/';
}

define('SITE_URL', $webRoot ?? '/');

require_once __DIR__ . '/config/session_init.php';
require_once __DIR__ . '/database/Database.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/ContactController.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/PostController.php';

require_once __DIR__ . '/controllers/admin/AdminUserController.php';
require_once __DIR__ . '/controllers/admin/AdminContactController.php';
require_once __DIR__ . '/controllers/admin/AdminCartController.php';
require_once __DIR__ . '/controllers/admin/AuditLoggerController.php';
require_once __DIR__ . '/controllers/admin/AdminDashboardController.php';
require_once __DIR__ . '/controllers/admin/AdminInfomationController.php';


enum Page: string {
    case Home = 'homepage';
    case Auth = 'auth';
    case Help = 'help';
    case Contact ='contact';
    case User = 'user';
    case Setting = 'setting';
    case Post = 'post';
    case Product = 'product';
    case Admin = 'admin';

    public static function isValid(string $name): bool {
        foreach (self::cases() as $case) {
            if ($case->value === $name) {
                return true;
            }
        }
        return false;
    }
}

enum UserPage: string {
    case Profile = 'profile';

    public static function isValid(string $name): bool {
        foreach (self::cases() as $case) {
            if ($case->value === $name) {
                return true;
            }
        }
        return false;
    }
}

enum AuthPage: string {
    case Login = 'login';
    case Logout = 'logout';
    case Register = 'register';
    
    public static function isValid(string $name): bool {
        foreach (self::cases() as $case) {
            if ($case->value === $name) {
                return true;
            }
        }
        return false;
    }
}

enum AdminPage: string {
    case Dashboard = 'dashboard';
    case CompanyInfo = 'infomation';
    case Homepage = 'homepage';
    case Contact = 'contact';
    case ContactDetail = 'contact-detail';
    case ContactAnswer = 'contact-answer';
    case About = 'about';
    case Help = 'help';
    case User = 'user';
    case Product = 'product';
    case Cart = 'cart';
    case Post = 'post';
    case AuditLog = 'log';

    public static function isValid(string $name): bool {
        foreach (self::cases() as $case) {
            if ($case->value === $name) {
                return true;
            }
        }
        return false;
    }
}

$route = $_GET['route'] ?? Page::Home->value;

$parts = explode('/', $route);

$controller = $parts[0];
$action = $parts[1] ?? '';
$id = $parts[2] ?? null;

$controller = Page::tryFrom($controller)->value;


if (!$controller || !Page::isValid($controller) ||
    ($controller == Page::Auth && !AuthPage::isValid($action)) ||
    ($controller == Page::User && !UserPage::isValid($action)) ||
    ($controller == Page::Admin && !AdminPage::isValid($action))) {
    header("Location: ".SITE_URL."/");
    exit();
}

switch ($controller) {
    case Page::Home->value: 
        (new HomeController())->home(); 
        break;
    case Page::Help->value:
        (new HomeController())->help();
        break;
    case Page::Contact->value:
        (new ContactController())->store();
        break; 
    case Page::Setting->value:
    case Page::Post->value:
        (new PostController())->posts();
        break;
    case Page::Product->value:
        (new ProductController())->products();
        break;
    case Page::Auth->value:
        match($action) {
            AuthPage::Login->value      => (new AuthController())->login(),
            AuthPage::Logout->value     => (new AuthController())->logout(),
            AuthPage::Register->value   => (new AuthController())->register(),
            default                     => require_once "views/error404.php"
        };
        break;
    case Page::User->value:
        match($action) {
            UserPage::Profile->value    => (new UserController())->profile(),          
            default                     => require_once "views/error404.php"
        };
        break;        
    case Page::Admin->value:
        // Check if there's admin access
        if (!isset($_SESSION['admin_auth']) || $_SESSION['admin_auth'] !== true) {
            require_once "views/error404.php";
            break; 
        }
        match($action) {
            AdminPage::Dashboard->value     => (new AdminDashboardController())->dashboard(),
            AdminPage::CompanyInfo->value   => (new AdminInfomationController())->index(),
            AdminPage::Contact->value       => (new AdminContactController())->contact(),
            AdminPage::ContactDetail->value => (new AdminContactController())->getDetail(),
            AdminPage::ContactAnswer->value => (new AdminContactController())->markAnswered(),
            AdminPage::User->value          => (new AdminUserController())->users(),
            AdminPage::Post->value          => require_once "views/error404.php",
            AdminPage::Product->value       => require_once "views/error404.php",
            AdminPage::AuditLog->value      => (new AuditLoggerController())->logs(),
            default                         => require_once "views/error404.php"
        };
        break;
    default:
        (new HomeController())->home();
}

