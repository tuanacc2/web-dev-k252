<?php
require_once BASE_DIR . '/models/MainProductModel.php';
require_once BASE_DIR . '/models/ImageModel.php';

class AdminMainProductController {
    private MainProductModel $mainProductModel;
    private ImageModel $imageModel;

    public function __construct() {
        $this->mainProductModel = new MainProductModel();
        $this->imageModel = new ImageModel();
    }

    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
    }

    public function store(): void {
        $this->respondJson(403, ['error' => 'Create main product is disabled']);
    }

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }

        try {
            $mainId = (int) ($id ?? 0);
            if ($mainId <= 0) {
                $this->respondJson(400, ['error' => 'Invalid main product id']);
            }

            $mainProduct = $this->mainProductModel->getById($mainId);
            if (!$mainProduct) {
                $this->respondJson(404, ['error' => 'Main product not found']);
            }

            $title = trim($_POST['title'] ?? '') ?: ($mainProduct['title'] ?? '');
            $description = trim($_POST['description'] ?? '') ?: ($mainProduct['description'] ?? '');

            $imagePath = $mainProduct['image'] ?? '';
            $imageFile = $_FILES['image'] ?? null;
            if ($imageFile && isset($imageFile['error'])) {
                if ($imageFile['error'] === UPLOAD_ERR_OK) {
                    $newImagePath = $this->imageModel->uploadImage($imageFile, ImageType::MainProduct);
                    if (!empty($imagePath) && str_starts_with($imagePath, '/assets/upload/main_products/')) {
                        $oldPath = BASE_DIR . '/' . ltrim($imagePath, '/');
                        if (is_file($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    $imagePath = $newImagePath;
                } elseif ($imageFile['error'] !== UPLOAD_ERR_NO_FILE) {
                    $this->respondJson(500, ['error' => 'Upload error']);
                }
            }

            $this->mainProductModel->updateById($mainId, [
                'title' => $title,
                'image' => $imagePath,
                'description' => $description,
            ]);

            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Main product updated',
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, ['error' => 'Failed to update main product']);
        }
    }

    public function delete(?string $id): void {
        $this->respondJson(403, ['error' => 'Delete main product is disabled']);
    }
}
