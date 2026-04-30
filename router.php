<?php
/**
 * Router cho PHP built-in server
 * Sử dụng: php -S localhost:8000 router.php
 * 
 * Cho phép routing như XAMPP:
 * localhost:8000/auth/login thay vì localhost:8000/?route=auth/login
 */

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/';

// Loại bỏ base path nếu cần
$route = trim($requestUri, '/');

// Danh sách các thư mục chứa file tĩnh
$staticDirs = [
    'assets',
    'public',
    'config'
];

$isStatic = false;

// Kiểm tra xem có phải file tĩnh không
foreach ($staticDirs as $dir) {
    if (strpos($route, $dir . '/') === 0) {
        $filePath = __DIR__ . '/' . $route;
        
        if (file_exists($filePath) && is_file($filePath)) {
            // Xác định MIME type
            $ext = pathinfo($filePath, PATHINFO_EXTENSION);
            $mimeTypes = [
                'css'   => 'text/css',
                'js'    => 'application/javascript',
                'json'  => 'application/json',
                'png'   => 'image/png',
                'jpg'   => 'image/jpeg',
                'jpeg'  => 'image/jpeg',
                'gif'   => 'image/gif',
                'svg'   => 'image/svg+xml',
                'avif'  => 'image/avif',
                'webp'  => 'image/webp',
                'woff'  => 'font/woff',
                'woff2' => 'font/woff2',
                'ttf'   => 'font/ttf',
                'eot'   => 'application/vnd.ms-fontobject',
            ];
            
            header('Content-Type: ' . ($mimeTypes[$ext] ?? 'application/octet-stream'));
            readfile($filePath);
            exit;
        }
    }
}

// Nếu không phải file tĩnh, chuyển hướng tới index.php với route
if (!empty($route) && $route !== '/') {
    $_GET['route'] = $route;
}

require_once 'index.php';
