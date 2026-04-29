<?php

$base_url = dirname($_SERVER['website_root'] ?? $_SERVER['SCRIPT_NAME'], 1);

// 1. Set the session cookie lifetime (30 minutes)
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

$now = time();

// 3. Implement server-side inactivity timeout
if (isset($_SESSION['last_activity']) && ($now - $_SESSION['last_activity'] > $lifetime)) {
    // Session expired: Clear and destroy
    session_unset();
    session_destroy();
    header("Location: $base_url/auth/login?message=expired");
    exit();
}

// 4. Update the last activity timestamp
$_SESSION['last_activity'] = $now;

// 5. Handle Admin-Specific Expiration (Separate from user session)
if (isset($_SESSION['admin_auth'])) {
    if (isset($_SESSION['admin_last_activity']) && ($now - $_SESSION['admin_last_activity'] > $lifetime)) {
        unset($_SESSION['admin_auth']);
        unset($_SESSION['admin_last_activity']);
    } else {
        $_SESSION['admin_last_activity'] = $now;
    }
}
?>