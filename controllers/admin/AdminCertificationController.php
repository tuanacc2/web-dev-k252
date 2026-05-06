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

    public function store(): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $logoFile = $_FILES['logo'] ?? null;
        if ($logoFile === null) {
            throw new RuntimeException('Missing logo file');
        }

        $logoPath = $this->imageModel->uploadImage($logoFile, ImageType::Certification);
        $title = trim($_POST['title'] ?? '');
        $subtitle = trim($_POST['subtitle'] ?? '');
        $content = trim($_POST['content'] ?? '');

        $this->certificationModel->create([
            'logo' => $logoPath,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
        ]);

        header('Location: ' . SITE_URL . '/admin/homepage');
        exit;
    }

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $certId = (int) ($id ?? 0);
        if ($certId <= 0) {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $certification = $this->certificationModel->getById($certId);
        if (!$certification) {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
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
                throw new RuntimeException('Upload error');
            }
        }

        $this->certificationModel->updateById($certId, [
            'logo' => $logoPath,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
        ]);

        header('Location: ' . SITE_URL . '/admin/homepage');
        exit;
    }

    public function delete(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $certId = (int) ($id ?? 0);
        if ($certId <= 0) {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $certification = $this->certificationModel->getById($certId);
        if (!empty($certification['logo']) && str_starts_with($certification['logo'], '/assets/upload/certifications/')) {
            $filePath = BASE_DIR . '/' . ltrim($certification['logo'], '/');
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }

        $this->certificationModel->deleteById($certId);
        header('Location: ' . SITE_URL . '/admin/homepage');
        exit;
    }
}
