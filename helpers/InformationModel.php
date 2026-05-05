<?php
require_once BASE_DIR . '/models/InformationModel.php';

function getSiteInfo() {
    static $cache = null;
    if ($cache !== null) return $cache;
    $model = new InformationModel();
    $data = $model->getAll();
    $result = [];
    foreach ($data as $info) {
        $result[$info['name']] = $info['value'];
    }
    $cache = $result;
    return $result;
}