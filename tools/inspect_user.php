<?php
chdir(__DIR__ . '/..');
require_once 'database/Database.php';
$db = Database::getInstance()->conn;
$stmt = $db->prepare('SELECT id, username, password, role, first_name, last_name FROM users WHERE username = ?');
$stmt->execute(['admin']);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
header('Content-Type: text/plain');
if ($row) {
    echo "Admin user record:\n";
    print_r($row);
} else {
    echo "Admin user not found\n";
}
