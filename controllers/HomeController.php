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
    private PostModel $postModel;
    private CertificationModel $certificationModel;
    private MainProductModel $mainProductModel;
    private ContentControllerModel $contentControllerModel;
    public function __construct() {
        $this->informationModel = new InformationModel();
        $this->advertisementsModel = new AdvertisementsModel();
        $this->scrollTextModel = new ScrollTextModel();
        $this->postModel = new PostModel();
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
        $latestPosts = $this->postModel->getRecentPostsNoCategory(3);
        require_once 'views/homepage.php';
    }

    public function aboutUs() {
        $information=$this->informationModel->getAll();
        $aboutRow = $this->informationModel->getByName('about_us');
        $aboutContent = $aboutRow['value'] ?? null;
        
        // Parse JSON if available, otherwise use as raw HTML
        $aboutSections = [];
        if (!empty($aboutContent)) {
            $decoded = json_decode($aboutContent, true);
            if (is_array($decoded)) {
                $aboutSections = $decoded;
            } else {
                // Fallback: treat as raw HTML for backward compatibility
                $aboutSections['about_content'] = $aboutContent;
            }
        }
        
        // Set defaults
        $aboutSections += [
            'about_content' => '',
            'philosophy_eyebrow' => 'Triết lý',
            'philosophy_title' => 'Lấy sự an toàn làm nền tảng',
            'philosophy_content' => '',
            'values_eyebrow' => 'Giá trị',
            'values_title' => 'Tôn trọng làn da Việt',
            'values_content' => '',
            'vision_eyebrow' => 'Định hướng',
            'vision_title' => 'Phát triển bền vững',
            'vision_content' => '',
            'mission_vision_eyebrow' => 'Sứ mệnh & cam kết',
            'mission_vision_title' => 'Phát triển đẹp hơn từ những điều rất gần gũi',
            'mission_vision_intro' => '',
            'mission_content' => '',
            'commitment_content' => '',
        ];
        
        require_once 'views/about_us.php';
    }

    public function faq() {
        $information = $this->informationModel->getAll();
        $faqsPath = BASE_DIR . '/data/faqs.json';
        $faqs = [];
        if (file_exists($faqsPath)) {
            $txt = file_get_contents($faqsPath);
            $decoded = json_decode($txt, true);
            if (is_array($decoded)) $faqs = $decoded;
        }
        require_once 'views/faq.php';
    }

    public function help() {
        require_once 'views/help.php';
    }
}