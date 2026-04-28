<?php

$base_url = dirname($_SERVER['website_root'] ?? $_SERVER['SCRIPT_NAME'], 1);

// 1. Set the session cookie lifetime (in seconds)
$lifetime = 1800;

// 2. Configure session parameters before calling session_start()
session_set_cookie_params([
    'lifetime' => $lifetime,
    'path' => '/',
    'secure' => false, // Set to 'true' if using HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

// 3. Implement server-side inactivity timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $lifetime)) {
    // Session expired: Clear and destroy
    session_unset();
    session_destroy();
    header("Location: login.php?message=expired");
    exit();
}

// 4. Update the last activity timestamp
$_SESSION['last_activity'] = time();
?>