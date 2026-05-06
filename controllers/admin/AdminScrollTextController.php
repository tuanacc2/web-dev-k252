<?php
require_once BASE_DIR . '/models/ScrollTextModel.php';

class AdminScrollTextController {
    private ScrollTextModel $scrollTextModel;

    public function __construct() {
        $this->scrollTextModel = new ScrollTextModel();
    }

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $scrollId = (int) ($id ?? 0);
        if ($scrollId <= 0) {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $content = trim($_POST['content'] ?? '');
        if ($content === '') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $this->scrollTextModel->updateContent($scrollId, $content);
        header('Location: ' . SITE_URL . '/admin/homepage');
        exit;
    }
}
