<?php
require_once BASE_DIR . '/models/AdvertisementsModel.php';
require_once BASE_DIR . '/models/ScrollTextModel.php';
require_once BASE_DIR . '/models/CertificationModel.php';

class AdminHomepageController {
    private AdvertisementsModel $advertisementsModel;
    private ScrollTextModel $scrollTextModel;
    private CertificationModel $certificationModel;

    public function __construct() {
        $this->advertisementsModel = new AdvertisementsModel();
        $this->scrollTextModel = new ScrollTextModel();
        $this->certificationModel = new CertificationModel();
    }

    public function index() {
        $advertisements = $this->advertisementsModel->getAll();
        $scrollTexts = $this->scrollTextModel->getAll();
        $certifications = $this->certificationModel->getAll();
        require BASE_DIR . '/views/admin/homepage.php';
    }
}
