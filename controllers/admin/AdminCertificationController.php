<?php
require_once BASE_DIR . '/models/CertificationModel.php';
require_once BASE_DIR . '/models/ImageModel.php';

class AdminCertificationController {
    private CertificationModel $certificationModel;
    private ImageModel $imageModel;

    public function __construct() {
        $this->certificationModel = new CertificationModel();
        $this->imageModel = new ImageModel();
    }

    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
    }

    public function store(): void {
        $this->respondJson(403, ['error' => 'Create certification is disabled']);
    }

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }
        try {
            $certId = (int) ($id ?? 0);
            if ($certId <= 0) {
                $this->respondJson(400, ['error' => 'Invalid certification id']);
            }

            $certification = $this->certificationModel->getById($certId);
            if (!$certification) {
                $this->respondJson(404, ['error' => 'Certification not found']);
            }

            $title = trim($_POST['title'] ?? '') ?: ($certification['title'] ?? '');
            $subtitle = trim($_POST['subtitle'] ?? '') ?: ($certification['subtitle'] ?? '');
            $content = trim($_POST['content'] ?? '') ?: ($certification['content'] ?? '');

            $logoPath = $certification['logo'] ?? '';
            $logoFile = $_FILES['logo'] ?? null;
            if ($logoFile && isset($logoFile['error'])) {
                if ($logoFile['error'] === UPLOAD_ERR_OK) {
                    $newLogoPath = $this->imageModel->uploadImage($logoFile, ImageType::Certification);
                    if (!empty($logoPath) && str_starts_with($logoPath, '/assets/upload/certifications/')) {
                        $oldPath = BASE_DIR . '/' . ltrim($logoPath, '/');
                        if (is_file($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    $logoPath = $newLogoPath;
                } elseif ($logoFile['error'] !== UPLOAD_ERR_NO_FILE) {
                    $this->respondJson(500, ['error' => 'Upload error']);
                }
            }

            $this->certificationModel->updateById($certId, [
                'logo' => $logoPath,
                'title' => $title,
                'subtitle' => $subtitle,
                'content' => $content,
            ]);

            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Certification updated',
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, ['error' => 'Failed to update certification']);
        }
    }

    public function delete(?string $id): void {
        $this->respondJson(403, ['error' => 'Delete certification is disabled']);
    }
}
