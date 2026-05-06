<?php
require_once BASE_DIR . '/models/AdvertisementsModel.php';
require_once BASE_DIR . '/models/ScrollTextModel.php';
require_once BASE_DIR . '/models/CertificationModel.php';
require_once BASE_DIR . '/models/ContentControllerModel.php';

class AdminHomepageController {
    private AdvertisementsModel $advertisementsModel;
    private ScrollTextModel $scrollTextModel;
    private CertificationModel $certificationModel;
    private ContentControllerModel $contentControllerModel;

    public function __construct() {
        $this->advertisementsModel = new AdvertisementsModel();
        $this->scrollTextModel = new ScrollTextModel();
        $this->certificationModel = new CertificationModel();
        $this->contentControllerModel = new ContentControllerModel();
    }

    public function index() {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            $visibility = $_POST['visibility'] ?? [];
            $contentControllers = $this->contentControllerModel->getBySiteName('homepage');
            foreach ($contentControllers as $row) {
                $id = (int) ($row['id'] ?? 0);
                $newVisible = isset($visibility[$id]) ? 1 : 0;
                if ($id > 0 && (int) $row['isVisible'] !== $newVisible) {
                    $this->contentControllerModel->updateVisibility($id, $newVisible);
                }
            }

            header('Location: ' . SITE_URL . '/admin/homepage');
            exit;
        }

        $advertisements = $this->advertisementsModel->getAll();
        $scrollTexts = $this->scrollTextModel->getAll();
        $certifications = $this->certificationModel->getAll();
        $contentControllers = $this->contentControllerModel->getBySiteName('homepage');
        require BASE_DIR . '/views/admin/homepage.php';
    }
}
