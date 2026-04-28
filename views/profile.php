<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>Danh sách người dùng</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= htmlspecialchars($user['first-name']) ?> - <?= htmlspecialchars($user['last-name']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>