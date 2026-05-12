<?php
require_once BASE_DIR . '/models/ContentControllerModel.php';
require_once BASE_DIR . '/models/AuditLoggerModel.php';

class AdminContentControllerController {
    private ContentControllerModel $contentModel;
    private AuditLoggerModel $auditModel;

    public function __construct() {
        $this->contentModel = new ContentControllerModel();
        $this->auditModel = new AuditLoggerModel();
    }

    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
    }

    /**
     * Bật/tắt hiển thị của content controller
     */
    public function toggle() {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            try {
                $visibility = $_POST['visibility'] ?? [];
                $contentControllers = $this->contentModel->getBySiteName('homepage');
                $updated = 0;
                foreach ($contentControllers as $row) {
                    $id = (int) ($row['id'] ?? 0);
                    $newVisible = isset($visibility[$id]) ? 1 : 0;
                    if ($id > 0 && (int) $row['isVisible'] !== $newVisible) {
                        $this->contentModel->updateVisibility($id, $newVisible);
                        $updated++;
                    }
                }
                $this->respondJson(200, [
                    'status' => 'success',
                    'message' => 'Visibility updated',
                    'updated' => $updated,
                ]);
            } catch (Throwable $e) {
                $this->respondJson(500, [
                    'status' => 'error',
                    'error' => 'Failed to update visibility',
                ]);
            }
        }
    }
}
