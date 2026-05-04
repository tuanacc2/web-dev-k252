<?php
require_once BASE_DIR . '/models/InfomationModel.php';

function getSiteInfo() {
    static $cache = null;
    if ($cache !== null) return $cache;
    $model = new InfomationModel();
    $data = $model->getAll();
    $result = [];
    foreach ($data as $info) {
        $result[$info['name']] = $info['value'];
    }
    $cache = $result;
    return $result;
}