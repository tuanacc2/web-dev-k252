<?php
require_once BASE_DIR . '/config/admin/idQuery.php';
require_once BASE_DIR . '/models/CategoryModel.php';

class AdminCategoryModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getCategoryById(int $category_id) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$category_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoryByName(string $name, Category $type) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE name = ? AND type = ?");
        $stmt->execute([$name, $type->value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategories(string $search = "", Category $type = Category::All, int $limit = 0, int $offset = 0) {
        $sql = "SELECT * FROM categories";
        $params = [];

        if (Category::isCategorized($type)) {
            $sql .= " WHERE type = :type";
            $params[':type'] = $type->value;
        }

        if ($search) {
            if (Category::isCategorized($type)) {
                $sql .= " AND";
            } else {
                $sql .= " WHERE";
            }
            $sql .= " name LIKE :search";
            $params[':search'] = "%$search%";
        }
        $sql .= " ORDER BY id DESC";
        if ($limit) {
            $sql .= " LIMIT :limit OFFSET :offset";
        }

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        if ($limit > 0) {
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory(string $name, string $description, Category $type) {
        $id = IdQuery::getId('categories');
        $stmt = $this->db->prepare("INSERT INTO categories (id, name, description, type) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$id, $name, $description, $type->value]);
    }

    public function updateCategory(int $id, string $name, string $description) {
        $stmt = $this->db->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $id]);
    }

    public function deleteCategoryById(int $category_id) {
        $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$category_id]);
    }

}