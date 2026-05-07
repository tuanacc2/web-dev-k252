<?php
require_once BASE_DIR . '/models/AdvertisementsModel.php';
require_once BASE_DIR . '/models/ImageModel.php';

class AdminAdvertisementController {
    private AdvertisementsModel $advertisementsModel;
    private ImageModel $imageModel;

    public function __construct() {
        $this->advertisementsModel = new AdvertisementsModel();
        $this->imageModel = new ImageModel();
    }

    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
    }

    public function store(): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }
        try {
            $leftImageFile = $_FILES['leftImage'] ?? null;
            if ($leftImageFile === null) {
                $this->respondJson(400, ['error' => 'Missing left image file']);
            }

            $leftImagePath = $this->imageModel->uploadImage($leftImageFile, ImageType::Advertisement);
            $thumbnail = trim($_POST['thumbnail'] ?? '');
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $link = trim($_POST['link'] ?? '');
            $textColor = trim($_POST['textColor'] ?? '') ?: '#1f1c17';
            $backgroundColor = trim($_POST['backgroundColor'] ?? '') ?: 'transparent';

            $this->advertisementsModel->create([
                'leftImage' => $leftImagePath,
                'thumbnail' => $thumbnail,
                'title' => $title,
                'content' => $content,
                'link' => $link,
                'textColor' => $textColor,
                'backgroundColor' => $backgroundColor,
            ]);

            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Advertisement created',
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, ['error' => 'Failed to create advertisement']);
        }
    }

    public function delete(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }
        try {
            $adId = (int) ($id ?? 0);
            if ($adId <= 0) {
                $this->respondJson(400, ['error' => 'Invalid advertisement id']);
            }

            $advertisement = $this->advertisementsModel->getById($adId);
            if (!$advertisement) {
                $this->respondJson(404, ['error' => 'Advertisement not found']);
            }

            if (!empty($advertisement['leftImage'])) {
                $filePath = BASE_DIR . '/' . ltrim($advertisement['leftImage'], '/');
                if (is_file($filePath)) {
                    unlink($filePath);
                }
            }

            $this->advertisementsModel->deleteById($adId);
            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Advertisement deleted',
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, ['error' => 'Failed to delete advertisement']);
        }
    }

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }
        try {
            $adId = (int) ($id ?? 0);
            if ($adId <= 0) {
                $this->respondJson(400, ['error' => 'Invalid advertisement id']);
            }

            $advertisement = $this->advertisementsModel->getById($adId);
            if (!$advertisement) {
                $this->respondJson(404, ['error' => 'Advertisement not found']);
            }

            $thumbnail = trim($_POST['thumbnail'] ?? '') ?: ($advertisement['thumbnail'] ?? '');
            $title = trim($_POST['title'] ?? '') ?: ($advertisement['title'] ?? '');
            $content = trim($_POST['content'] ?? '') ?: ($advertisement['content'] ?? '');
            $link = trim($_POST['link'] ?? '') ?: ($advertisement['link'] ?? '');
            $textColor = trim($_POST['textColor'] ?? '') ?: ($advertisement['textColor'] ?? '#1f1c17');
            $backgroundColor = trim($_POST['backgroundColor'] ?? '') ?: ($advertisement['backgroundColor'] ?? 'transparent');

            $leftImagePath = $advertisement['leftImage'] ?? '';
            $leftImageFile = $_FILES['leftImage'] ?? null;
            if ($leftImageFile && isset($leftImageFile['error'])) {
                if ($leftImageFile['error'] === UPLOAD_ERR_OK) {
                    $newImagePath = $this->imageModel->uploadImage($leftImageFile, ImageType::Advertisement);
                    if (!empty($leftImagePath)) {
                        $oldPath = BASE_DIR . '/' . ltrim($leftImagePath, '/');
                        if (is_file($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    $leftImagePath = $newImagePath;
                } elseif ($leftImageFile['error'] !== UPLOAD_ERR_NO_FILE) {
                    $this->respondJson(500, ['error' => 'Upload error']);
                }
            }

            $this->advertisementsModel->updateById($adId, [
                'leftImage' => $leftImagePath,
                'thumbnail' => $thumbnail,
                'title' => $title,
                'content' => $content,
                'link' => $link,
                'textColor' => $textColor,
                'backgroundColor' => $backgroundColor,
            ]);

            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Advertisement updated',
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, ['error' => 'Failed to update advertisement']);
        }
    }
}
