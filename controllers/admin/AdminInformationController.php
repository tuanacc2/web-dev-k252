<?php
require_once BASE_DIR . '/models/InformationModel.php';

class AdminInformationController {
    private InformationModel $model;

    public function __construct() {
        $this->model = new InformationModel();
    }

    // Render admin list view
    public function index() {
        $items = $this->model->getAll();
        require BASE_DIR . '/views/admin/information.php';
    }

    // Return JSON only for admin
    public function getAllJson() {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'data' => $this->model->getAll()
        ]);
        exit;
    }
}
