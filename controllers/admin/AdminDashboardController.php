<?php
require_once BASE_DIR .'/models/AuditLoggerModel.php';
require_once BASE_DIR .'/models/PostModel.php';
require_once BASE_DIR .'/models/ProductModel.php';

class AdminDashboardController {

    public function dashboard() {
        global $base_url;
        $log = (new AuditLoggerModel())->getLogs();

        require_once 'views/admin/dashboard.php';
    }
}