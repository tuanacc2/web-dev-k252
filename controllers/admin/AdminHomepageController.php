<?php
require_once BASE_DIR . '/models/AdvertisementsModel.php';
require_once BASE_DIR . '/models/ScrollTextModel.php';
require_once BASE_DIR . '/models/CertificationModel.php';
require_once BASE_DIR . '/models/ContentControllerModel.php';
require_once BASE_DIR . '/models/MainProductModel.php';

class AdminHomepageController {
    private AdvertisementsModel $advertisementsModel;
    private ScrollTextModel $scrollTextModel;
    private CertificationModel $certificationModel;
    private ContentControllerModel $contentControllerModel;
    private MainProductModel $mainProductModel;

    public function __construct() {
        $this->advertisementsModel = new AdvertisementsModel();
        $this->scrollTextModel = new ScrollTextModel();
        $this->certificationModel = new CertificationModel();
        $this->contentControllerModel = new ContentControllerModel();
        $this->mainProductModel = new MainProductModel();
    }

    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
    }

    public function index() {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            try {
                $visibility = $_POST['visibility'] ?? [];
                $contentControllers = $this->contentControllerModel->getBySiteName('homepage');
                $updated = 0;
                foreach ($contentControllers as $row) {
                    $id = (int) ($row['id'] ?? 0);
                    $newVisible = isset($visibility[$id]) ? 1 : 0;
                    if ($id > 0 && (int) $row['isVisible'] !== $newVisible) {
                        $this->contentControllerModel->updateVisibility($id, $newVisible);
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

        $advertisements = $this->advertisementsModel->getAll();
        $scrollTexts = $this->scrollTextModel->getAll();
        $certifications = $this->certificationModel->getAll();
        $mainProducts = $this->mainProductModel->getAll();
        $contentControllers = $this->contentControllerModel->getBySiteName('homepage');
        require BASE_DIR . '/views/admin/homepage.php';
    }
}
