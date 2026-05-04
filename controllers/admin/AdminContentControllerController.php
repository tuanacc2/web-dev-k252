<?php
require_once BASE_DIR . '/models/ContentControllerModel.php';
require_once BASE_DIR . '/models/AuditLoggerModel.php';

class AdminContentControllerController {
    private ContentControllerModel $contentModel;
    private AuditLoggerModel $auditModel;

    public function __construct() {
        $this->contentModel = new ContentControllerModel();
        $this->auditModel = new AuditLoggerModel();
    }

    /**
     * Hiển thị danh sách tất cả content controllers
     */
    public function index() {
        $contents = $this->contentModel->getAll();
        require_once BASE_DIR . '/views/admin/contentController.php';
    }

    /**
     * Hiển thị content controllers của một site
     */
    public function bySite(string $siteName) {
        $contents = $this->contentModel->getBySiteName($siteName);
        $site = $siteName;
        require_once BASE_DIR . '/views/admin/contentController.php';
    }

    /**
     * Bật/tắt hiển thị của content controller
     */
    public function toggle(int $id) {
        $content = $this->contentModel->getById($id);

        if (!$content) {
            $_SESSION['error'] = 'Không tìm thấy content controller';
            header('Location: /admin/contentController');
            exit;
        }

        try {
            $result = $this->contentModel->toggleVisibility($id);
            
            if ($result) {
                $newStatus = $content['isVisible'] ? 'Ẩn' : 'Hiển thị';
                $this->auditModel->log(
                    $_SESSION['user_id'] ?? null,
                    'TOGGLE_CONTENT',
                    $id,
                    "Bật/tắt {$content['elementName']} - Trạng thái: $newStatus"
                );
                $_SESSION['success'] = 'Cập nhật trạng thái thành công';
            } else {
                $_SESSION['error'] = 'Không thể cập nhật trạng thái';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'Lỗi: ' . $e->getMessage();
        }

        header('Location: /admin/contentController');
        exit;
    }
}
