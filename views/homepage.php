<?php $title = "Homepage"; ?>
<?php $title = "Homepage"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/public/css/header.css">

</head>
<body>
<div class="w-full min-h-[10000px] bg-[#fefbf4]">
<!-- Header section -->
<?php include __DIR__ . '/layout/header.php'; ?>
<!-- Main content -->

<!--  Footer section -->
<?php include __DIR__ . '/layout/footer.php'; ?>
</div>
</body>
</html>