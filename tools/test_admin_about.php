<?php
chdir(__DIR__ . '/..');
// Start session and set admin flag to bypass admin auth for testing
if (session_status() === PHP_SESSION_NONE) session_start();
$_SESSION['admin_auth'] = true;
$_SESSION['admin_name'] = 'Admin Test';
$_GET['route'] = 'admin/about';
include 'index.php';
