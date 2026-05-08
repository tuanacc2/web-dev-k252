<?php
chdir(__DIR__ . '/..');
// Render public about page
$_GET['route'] = 'homepage/about_us';
include 'index.php';
