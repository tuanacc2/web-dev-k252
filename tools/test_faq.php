<?php
// Quick test runner for the FAQ route (for local dev only)
chdir(__DIR__ . '/..');
$_GET['route'] = 'faq';
include 'index.php';
