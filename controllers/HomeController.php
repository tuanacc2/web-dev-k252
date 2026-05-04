<?php
require_once BASE_DIR .'/models/InfomationModel.php';
require_once BASE_DIR .'/models/AdvertisementsModel.php';
require_once BASE_DIR .'/models/ScrollTextModel.php';
require_once BASE_DIR .'/models/CertificationModel.php';
require_once BASE_DIR .'/models/MainProductModel.php';
require_once BASE_DIR .'/models/ContentControllerModel.php';

class HomeController {
    private InfomationModel $infomationModel;
    private AdvertisementsModel $advertisementsModel;
    private ScrollTextModel $scrollTextModel;
    private CertificationModel $certificationModel;
    private MainProductModel $mainProductModel;
    private ContentControllerModel $contentControllerModel;
    public function __construct() {
        $this->infomationModel = new InfomationModel();
        $this->advertisementsModel = new AdvertisementsModel();
        $this->scrollTextModel = new ScrollTextModel();
        $this->certificationModel = new CertificationModel();
        $this->mainProductModel = new MainProductModel();
        $this->contentControllerModel = new ContentControllerModel();
    }


    public function home() {
        $advertisements = $this->advertisementsModel->getHomepageAdvertisements();
        $scrollTexts = $this->scrollTextModel->getAll();
        $certifications = $this->certificationModel->getAll();
        $mainProducts = $this->mainProductModel->getAll();
        $content = $this->contentControllerModel->getBySiteName('homepage');
        require_once 'views/homepage.php';
    }

    public function about() {
        require_once 'views/about.php';
    }

    public function help() {
        require_once 'views/help.php';
    }
}