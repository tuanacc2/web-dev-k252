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

    public function store(): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $leftImageFile = $_FILES['leftImage'] ?? null;
        if ($leftImageFile === null) {
            throw new RuntimeException('Missing left image file');
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

        header('Location: ' . SITE_URL . '/admin/homepage');
        exit;
    }

    public function delete(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $adId = (int) ($id ?? 0);
        if ($adId <= 0) {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $advertisement = $this->advertisementsModel->getById($adId);
        if (!empty($advertisement['leftImage'])) {
            $filePath = BASE_DIR . '/' . ltrim($advertisement['leftImage'], '/');
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }

        $this->advertisementsModel->deleteById($adId);
        header('Location: ' . SITE_URL . '/admin/homepage');
        exit;
    }

    public function update(?string $id): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $adId = (int) ($id ?? 0);
        if ($adId <= 0) {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $advertisement = $this->advertisementsModel->getById($adId);
        if (!$advertisement) {
            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
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
                throw new RuntimeException('Upload error');
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

        header('Location: ' . SITE_URL . '/admin/homepage');
        exit;
    }
}
