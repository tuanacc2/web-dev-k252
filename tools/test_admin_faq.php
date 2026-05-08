<?php
require_once __DIR__ . '/../config/session_init.php';
require_once __DIR__ . '/../index.php';

// Simulate admin auth
$_SESSION['admin_auth'] = true;

// prepare fake faqs
$faqs = [
    ["id"=>1, "category"=>"Test", "question"=>"Q1?", "answer"=>"A1"],
    ["id"=>2, "category"=>"Test", "question"=>"Q2?", "answer"=>"A2"]
];

// Call controller directly
require_once BASE_DIR . '/controllers/admin/AdminFaqController.php';
$ctrl = new AdminFaqController();

// simulate POST data
$_POST['faqs'] = json_encode($faqs, JSON_UNESCAPED_UNICODE);

$ctrl->save();

echo "Done\n";
