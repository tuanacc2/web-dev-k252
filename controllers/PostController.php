<?php
require_once BASE_DIR .'/models/InformationModel.php';
require_once BASE_DIR .'/models/AdvertisementsModel.php';
require_once BASE_DIR .'/models/ScrollTextModel.php';
require_once BASE_DIR .'/models/CertificationModel.php';
require_once BASE_DIR .'/models/MainProductModel.php';

require_once BASE_DIR .'/models/PostModel.php';

class PostController {
    private InformationModel $informationModel;
    private AdvertisementsModel $advertisementsModel;
    private ScrollTextModel $scrollTextModel;
    private CertificationModel $certificationModel;
    private MainProductModel $mainProductModel;


    private AuditLoggerModel $logModel;
    private PostModel $postModel;

    public function __construct() {
        $this->informationModel = new InformationModel();
        $this->advertisementsModel = new AdvertisementsModel();
        $this->scrollTextModel = new ScrollTextModel();
        $this->certificationModel = new CertificationModel();
        $this->mainProductModel = new MainProductModel();

        $this->logModel = new AuditLoggerModel();
        $this->postModel = new PostModel();
    }

    public function posts() {
        // Default header & footer

       
        $posts = $this->postModel->getPost();

        require_once 'views/posts.php';
    }

    public function postDetail(int $post_id) {
        $post = $this->postModel->getPostById($post_id);

        require_once 'views/postDetail.php';
    }
}