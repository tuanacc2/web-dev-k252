<?php
require_once BASE_DIR .'/models/InformationModel.php';
require_once BASE_DIR .'/models/AdvertisementsModel.php';
require_once BASE_DIR .'/models/ScrollTextModel.php';
require_once BASE_DIR .'/models/CertificationModel.php';
require_once BASE_DIR .'/models/MainProductModel.php';
require_once BASE_DIR .'/models/ContentControllerModel.php';

class HomeController {
    private InformationModel $informationModel;
    private AdvertisementsModel $advertisementsModel;
    private ScrollTextModel $scrollTextModel;
    private CertificationModel $certificationModel;
    private MainProductModel $mainProductModel;
    private ContentControllerModel $contentControllerModel;
    public function __construct() {
        $this->informationModel = new InformationModel();
        $this->advertisementsModel = new AdvertisementsModel();
        $this->scrollTextModel = new ScrollTextModel();
        $this->certificationModel = new CertificationModel();
        $this->mainProductModel = new MainProductModel();
        $this->contentControllerModel = new ContentControllerModel();
    }


    public function home() {
        $information=$this->informationModel->getAll();
        $advertisements = $this->advertisementsModel->getAll();
        $scrollTexts = $this->scrollTextModel->getAll();
        $certifications = $this->certificationModel->getAll();
        $mainProducts = $this->mainProductModel->getAll();
        $content = $this->contentControllerModel->getBySiteName('homepage');
        require_once 'views/homepage.php';
    }

    public function aboutUs() {
        $information=$this->informationModel->getAll();
        require_once 'views/about_us.php';
    }

    public function help() {
        require_once 'views/help.php';
    }
}