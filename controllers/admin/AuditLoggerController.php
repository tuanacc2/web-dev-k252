<?php
require_once BASE_DIR .'/models/AuditLoggerModel.php';

class AuditLoggerController {
    private AuditLoggerModel $loggerModel;

    public function __construct() {
        $this->loggerModel = new AuditLoggerModel();
    }

    public function logs() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $limit = 10;
        $page = isset($_GET['page']) && is_int($_GET['page']) ? (int)($_GET['page']) : 1;
        $total = count($this->loggerModel->getLogs($search));
        $totalPage = ceil($total / $limit);
        $logs = $this->loggerModel->getLogs($search, $limit, $offset = ($page - 1) * $limit);

        require_once 'views/admin/log.php';
    }
}