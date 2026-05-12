<?php
chdir(__DIR__ . '/..');
// Render public about page
$_GET['route'] = 'about_us';
include 'index.php';
