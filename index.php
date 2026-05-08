<?php
header('Content-Type: text/html; charset=utf-8');

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

require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/ContactController.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/PostController.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/UserController.php';

require_once __DIR__ . '/controllers/admin/AdminCartController.php';
require_once __DIR__ . '/controllers/admin/AdminCategoryController.php';
require_once __DIR__ . '/controllers/admin/AdminContactController.php';
require_once __DIR__ . '/controllers/admin/AdminDashboardController.php';
require_once __DIR__ . '/controllers/admin/AdminHomepageController.php';
require_once __DIR__ . '/controllers/admin/AdminInformationController.php';
require_once __DIR__ . '/controllers/admin/AdminPostController.php';
require_once __DIR__ . '/controllers/admin/AdminUserController.php';
require_once __DIR__ . '/controllers/admin/AuditLoggerController.php';
require_once __DIR__ . '/controllers/admin/AdminAdvertisementController.php';
require_once __DIR__ . '/controllers/admin/AdminScrollTextController.php';
require_once __DIR__ . '/controllers/admin/AdminCertificationController.php';
require_once __DIR__ . '/controllers/admin/AdminMainProductController.php';

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
    case CompanyInfo = 'information';
    case CompanyInfoUpdate = 'information-update';
    case Homepage = 'homepage';
    case Contact = 'contact';
    case ContactDetail = 'contact-detail';
    case ContactAnswer = 'contact-answer';
    case About = 'about';
    case Help = 'help';
    case Category = 'category';
    case User = 'user';
    case Product = 'product';
    case Cart = 'cart';
    case Post = 'post';
    case AuditLog = 'log';
    case Advertisement = 'advertisement';
    case AdvertisementDelete = 'advertisement-delete';
    case AdvertisementUpdate = 'advertisement-update';
    case ScrollTextUpdate = 'scrolltext-update';
    case CertificationUpdate = 'certification-update';
    case Certification = 'certification';
    case CertificationDelete = 'certification-delete';
    case MainProduct = 'mainproduct';
    case MainProductUpdate = 'mainproduct-update';
    case MainProductDelete = 'mainproduct-delete';

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
$subAction = $parts[2] ?? null;

$page = Page::tryFrom($controller);
$controller = $page?->value;


if (!$controller || !Page::isValid($controller) ||
    ($controller == Page::Home->value && !in_array($action, ['', 'about_us'], true)) ||
    ($controller == Page::Auth && !AuthPage::isValid($action)) ||
    ($controller == Page::User && !UserPage::isValid($action)) ||
    ($controller == Page::Post->value && !in_array($action, ['', 'view'], true)) || // PostController chỉ có 2 route: /post và /post/view/{id}
    ($controller == Page::Admin && !AdminPage::isValid($action))) {
    header("Location: ".SITE_URL."/");
    exit();
}

switch ($controller) {
    case Page::Home->value: 
        match($action) {
            'about_us' => (new HomeController())->aboutUs(),
            default => (new HomeController())->home(),
        };
        break;
    case Page::Help->value:
        (new HomeController())->help();
        break;
    case Page::Contact->value:
        (new ContactController())->store();
        break; 
    case Page::Setting->value:
    case Page::Post->value:
        if ($action === 'view' && $subAction && is_numeric($subAction)) {
            (new PostController())->postDetail((int)$subAction); // New method for single post
        } else {
            (new PostController())->posts(); // Default list view
        }
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
        if ($action === '' || $action === 'dashboard') {
            (new AdminDashboardController())->dashboard();
            break;
        }
        if ($subAction) {
            switch ($action) {
                case AdminPage::ContactDetail->value:
                    (new AdminContactController())->getDetail();
                    break;
                case AdminPage::ContactAnswer->value:
                    (new AdminContactController())->markAnswered();
                    break;
                case AdminPage::Category->value:
                    match($subAction) {
                        'add' => (new AdminCategoryController())->add(),
                        'update' => (new AdminCategoryController())->update(),
                        'delete' => (new AdminCategoryController())->delete(),
                        default => require_once "views/error404.php"
                    };
                case AdminPage::Post->value:
                    match($subAction) {
                        'add' => (new AdminPostController())->add(),
                        'update' => (new AdminPostController())->update(),
                        'delete' => (new AdminPostController())->delete(),
                        default => require_once "views/error404.php"
                    };
                    break;
                default:
                    require_once "views/error404.php";
                    break;
            }
        } else {
            match($action) {
                AdminPage::Dashboard->value     => (new AdminDashboardController())->dashboard(),
                AdminPage::CompanyInfo->value   => (new AdminInformationController())->index(),
                AdminPage::CompanyInfoUpdate->value => (new AdminInformationController())->update($subAction),
            AdminPage::Homepage->value      => (new AdminHomepageController())->index(),
    
            AdminPage::Contact->value       => (new AdminContactController())->contact(),
                AdminPage::ContactDetail->value => (new AdminContactController())->getDetail(),
                AdminPage::ContactAnswer->value => (new AdminContactController())->markAnswered(),
                AdminPage::Category->value      => (new AdminCategoryController())->category(),
                
            AdminPage::User->value          => (new AdminUserController())->users(),
                AdminPage::Post->value          => (new AdminPostController())->posts(),
                AdminPage::Product->value       => require_once "views/error404.php",
                AdminPage::AuditLog->value      => (new AuditLoggerController())->logs(),
                AdminPage::Advertisement->value => (new AdminAdvertisementController())->store(),
                AdminPage::AdvertisementDelete->value => (new AdminAdvertisementController())->delete($subAction),
                AdminPage::AdvertisementUpdate->value => (new AdminAdvertisementController())->update($subAction),
                AdminPage::ScrollTextUpdate->value => (new AdminScrollTextController())->update($subAction),
                AdminPage::CertificationUpdate->value => (new AdminCertificationController())->update($subAction),
                AdminPage::Certification->value => (new AdminCertificationController())->store(),
                AdminPage::CertificationDelete->value => (new AdminCertificationController())->delete($subAction),
                AdminPage::MainProduct->value => (new AdminMainProductController())->store(),
                AdminPage::MainProductUpdate->value => (new AdminMainProductController())->update($subAction),
                AdminPage::MainProductDelete->value => (new AdminMainProductController())->delete($subAction),
                default                         => require_once "views/error404.php"
            };
            break;
        }
        break;
    default:
        (new HomeController())->home();
}

