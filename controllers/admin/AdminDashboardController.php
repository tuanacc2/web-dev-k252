<?php
require_once BASE_DIR .'/models/AuditLoggerModel.php';
require_once BASE_DIR .'/models/PostModel.php';
require_once BASE_DIR .'/models/ProductModel.php';

class AdminDashboardController {

    public function dashboard() {
        $log = (new AuditLoggerModel())->getLogs();

        require_once 'views/admin/dashboard.php';
    }
}