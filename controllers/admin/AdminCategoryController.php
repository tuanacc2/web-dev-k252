<?php
require_once BASE_DIR .'/models/admin/AdminCategoryModel.php';
require_once BASE_DIR .'/models/AuditLoggerModel.php';

class AdminCategoryController {
    private AuditLoggerModel $loggerModel;
    private AdminCategoryModel $categoryModel;

    public function __construct() {
        $this->loggerModel = new AuditLoggerModel();
        $this->categoryModel = new AdminCategoryModel();

    }

    public function category() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $limit = 10;
        $page = isset($_GET['page']) && is_int($_GET['page']) ? (int)($_GET['page']) : 1;
        $total = count($this->categoryModel->getCategories($search, $type));
        $totalPage = ceil($total / $limit);
        $categories = $this->categoryModel->getCategories($search, $type, $limit, $offset = ($page - 1) * $limit);

        require_once 'views/admin/category.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $type = $_POST['type'] ?? '';

            if ($name && $type) {
                $this->categoryModel->addCategory($name, $description, $type);
                $this->loggerModel->log(Action::AddCategory->value, $_SESSION['admin_id'] ?? null, 'Added new category: ' . $name);
                header('Location: ' . SITE_URL . '/admin/category');
                exit();
            }
        }

        require_once 'views/error404.php';    
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_id = $_POST['id'] ?? null;

            if ($category_id) {
                $this->categoryModel->deleteCategoryById($category_id);
                $this->loggerModel->log(Action::DeleteCategory->value, $_SESSION['admin_id'] ?? null, 'Deleted category with ID: ' . $category_id);
                header('Location: ' . SITE_URL . '/admin/category');
                exit();
            }
        }

        require_once 'views/error404.php';    
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_id = isset($_POST['id']) ? (int)$_POST['id'] : null;
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            if ($category_id && $name) {
                $this->categoryModel->updateCategory($category_id, $name, $description);
                $this->loggerModel->log(Action::UpdateCategory->value, $_SESSION['admin_id'] ?? null, 'Updated category with ID: ' . $category_id, $category_id);
                header('Location: ' . SITE_URL . '/admin/category');
                exit();
            }
        }

        require_once 'views/error404.php';        
    }
}