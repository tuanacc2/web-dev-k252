<?php
require_once BASE_DIR . '/models/ScrollTextModel.php';

class AdminScrollTextController {
    private ScrollTextModel $scrollTextModel;

    public function __construct() {
        $this->scrollTextModel = new ScrollTextModel();
    }

    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
    }

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }
        try {
            $scrollId = (int) ($id ?? 0);
            if ($scrollId <= 0) {
                $this->respondJson(400, ['error' => 'Invalid scroll text id']);
            }

            $content = trim($_POST['content'] ?? '');
            if ($content === '') {
                $this->respondJson(400, ['error' => 'Content is required']);
            }

            $this->scrollTextModel->updateContent($scrollId, $content);
            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Scroll text updated',
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, ['error' => 'Failed to update scroll text']);
        }
    }
}
