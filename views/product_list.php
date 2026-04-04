<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Danh sách product</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li><?= htmlspecialchars($product['name']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>