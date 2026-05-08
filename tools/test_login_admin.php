<?php
chdir(__DIR__ . '/..');
// Simulate POST to auth/login
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['username'] = 'admin';
$_POST['password'] = '0';
$_GET['route'] = 'auth/login';
// include necessary files
require 'index.php';
