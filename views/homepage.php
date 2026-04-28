<?php
require_once __DIR__ . '/../controllers/HomeController.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <style>
        .nav-hover {
            position: relative;
            display: inline-block;
        }
        .nav-hover::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            height: 1px;
            width: 0;
            background: #1f1c17;
            transform: translateX(-50%);
            transition: all 0.3s ease;
        }
        .nav-hover:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="w-full min-h-[10000px] bg-[#fefbf4]">
<!-- Header section -->
<?php include __DIR__ . '/partials/header.php'; ?>
<script src="../public/assets/js/header.js"></script>
<!--  Footer section -->
</div>
</body>
</html>