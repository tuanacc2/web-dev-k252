<?php
require_once BASE_DIR . '/models/InformationModel.php';
require_once BASE_DIR . '/models/ImageModel.php';

class AdminInformationController {
    private InformationModel $model;
    private ImageModel $imageModel;

    public function __construct() {
        $this->model = new InformationModel();
        $this->imageModel = new ImageModel();
    }

    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
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

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }

        try {
            $infoId = (int) ($id ?? 0);
            if ($infoId <= 0) {
                $this->respondJson(400, ['error' => 'Invalid information id']);
            }

            $info = $this->model->getById($infoId);
            if (!$info) {
                $this->respondJson(404, ['error' => 'Information not found']);
            }

            $name = trim($_POST['name'] ?? '') ?: ($info['name'] ?? '');
            $type = trim($_POST['type'] ?? '') ?: ($info['type'] ?? '');
            $value = trim($_POST['value'] ?? '') ?: ($info['value'] ?? '');

            if ($type === 'image') {
                $imageFile = $_FILES['image'] ?? null;
                if ($imageFile && isset($imageFile['error'])) {
                    if ($imageFile['error'] === UPLOAD_ERR_OK) {
                        $newPath = $this->imageModel->uploadImage($imageFile, ImageType::Information);
                        if (!empty($value) && str_starts_with($value, '/assets/upload/informations/')) {
                            $oldPath = BASE_DIR . '/' . ltrim($value, '/');
                            if (is_file($oldPath)) {
                                unlink($oldPath);
                            }
                        }
                        $value = $newPath;
                    } elseif ($imageFile['error'] !== UPLOAD_ERR_NO_FILE) {
                        $this->respondJson(500, ['error' => 'Upload error']);
                    }
                }
            }

            $this->model->updateById($infoId, [
                'name' => $name,
                'type' => $type,
                'value' => $value,
            ]);

            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Information updated',
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, ['error' => 'Failed to update information']);
        }
    }
}
