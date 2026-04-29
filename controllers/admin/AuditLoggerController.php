<?php
require_once BASE_DIR .'/models/AuditLoggerModel.php';

class AuditLoggerController {
    public function logs() {
        $users = (new AuditLoggerModel())->getLogs();

        require_once 'views/admin/log.php';
    }
}