<?php
// Minimal test runner for AdminFaqController->save
define('BASE_DIR', dirname(__DIR__));
require_once BASE_DIR . '/models/FaqModel.php';
require_once BASE_DIR . '/controllers/admin/AdminFaqController.php';

// simulate admin session
session_start();
$_SESSION['admin_auth'] = true;

$faqs = [
    ["id"=>1, "category"=>"Test", "question"=>"Q1?", "answer"=>"A1"],
    ["id"=>2, "category"=>"Test", "question"=>"Q2?", "answer"=>"A2"]
];

$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['faqs'] = json_encode($faqs, JSON_UNESCAPED_UNICODE);

$ctrl = new AdminFaqController();
$ctrl->save();

echo "-> script done\n";
