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
        $advertisements = $this->advertisementsModel->getHomepageAdvertisements();
        $scrollTexts = $this->scrollTextModel->getAll();
        $certifications = $this->certificationModel->getAll();
        $mainProducts = $this->mainProductModel->getAll();
        $content = $this->contentControllerModel->getBySiteName('homepage');
        require_once 'views/homepage.php';
    }

    public function aboutUs() {
        $information=$this->informationModel->getAll();
        $companyName='';
        $phone='';
        $email='';
        $address='';
        $messenger='';
        $zalo='';
        $facebook='';
        $instagram='';
        $twitter='';
        $logo='';
        foreach($information as $info){
            switch($info['name']){
                case 'Company Name':
                    $companyName=$info['value'];
                    break;
                case 'Phone':
                    $phone=$info['value'];
                    break;
                case 'Email':
                    $email=$info['value'];
                    break;
                case 'Address':
                    $address=$info['value'];
                    break;
                case 'Messenger':
                    $messenger=$info['value'];
                    break;
                case 'Zalo':
                    $zalo=$info['value'];
                    break;
                case 'Facebook':
                    $facebook=$info['value'];
                    break;
                case 'Instagram':
                    $instagram=$info['value'];
                    break;
                case 'Logo':
                    $logo=$info['value'];
                    break;
                case 'Twitter':
                    $twitter=$info['value'];
                    break;
            }
        }

        require_once 'views/about_us.php';
    }

    public function help() {
        require_once 'views/help.php';
    }
}