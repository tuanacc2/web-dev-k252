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

    /**
     * Render and handle About Us admin editing with multiple sections
     */
    public function about(): void {
        // require admin only check already done in index.php
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            // Collect all sections
            $aboutData = [
                'about_content' => $_POST['about_content'] ?? '',
                'philosophy_eyebrow' => $_POST['philosophy_eyebrow'] ?? 'Triết lý',
                'philosophy_title' => $_POST['philosophy_title'] ?? '',
                'philosophy_content' => $_POST['philosophy_content'] ?? '',
                'values_eyebrow' => $_POST['values_eyebrow'] ?? 'Giá trị',
                'values_title' => $_POST['values_title'] ?? '',
                'values_content' => $_POST['values_content'] ?? '',
                'vision_eyebrow' => $_POST['vision_eyebrow'] ?? 'Định hướng',
                'vision_title' => $_POST['vision_title'] ?? '',
                'vision_content' => $_POST['vision_content'] ?? '',
                'mission_vision_eyebrow' => $_POST['mission_vision_eyebrow'] ?? 'Sứ mệnh & cam kết',
                'mission_vision_title' => $_POST['mission_vision_title'] ?? '',
                'mission_vision_intro' => $_POST['mission_vision_intro'] ?? '',
                'mission_content' => $_POST['mission_content'] ?? '',
                'commitment_content' => $_POST['commitment_content'] ?? '',
            ];

            // Save as JSON
            $jsonValue = json_encode($aboutData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            
            $existing = $this->model->getByName('about_us');
            if ($existing) {
                $this->model->updateById((int)$existing['id'], [
                    'name' => 'about_us',
                    'type' => 'json',
                    'value' => $jsonValue,
                ]);
            } else {
                $this->model->add('about_us', 'json', $jsonValue);
            }
            // redirect back to admin about page
            header('Location: '. (SITE_URL ?? '') .'/admin/about');
            exit;
        }

        $item = $this->model->getByName('about_us');
        $aboutValue = $item['value'] ?? '';
        
        // Try to parse as JSON for form population
        $aboutData = [];
        if (!empty($aboutValue)) {
            $decoded = json_decode($aboutValue, true);
            if (is_array($decoded)) {
                $aboutData = $decoded;
            } else {
                // Fallback to raw HTML if not JSON
                $aboutData['about_content'] = $aboutValue;
            }
        }
        
        // Extract individual fields with defaults
        extract($aboutData + [
            'about_content' => '',
            'philosophy_eyebrow' => 'Triết lý',
            'philosophy_title' => 'Lấy sự an toàn làm nền tảng',
            'philosophy_content' => '',
            'values_eyebrow' => 'Giá trị',
            'values_title' => 'Tôn trọng làn da Việt',
            'values_content' => '',
            'vision_eyebrow' => 'Định hướng',
            'vision_title' => 'Phát triển bền vững',
            'vision_content' => '',
            'mission_vision_eyebrow' => 'Sứ mệnh & cam kết',
            'mission_vision_title' => 'Phát triển đẹp hơn từ những điều rất gần gũi',
            'mission_vision_intro' => '',
            'mission_content' => '',
            'commitment_content' => '',
        ]);

        require BASE_DIR . '/views/admin/about_edit.php';
    }
}
