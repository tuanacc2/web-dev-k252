<?php

enum Category: string {
    case Post = 'post';
    case Product = 'product';
    case All = 'all';
    public static function fromString(string $type): ?self {
        return match (strtolower($type)) {
            'post' => self::Post,
            'product' => self::Product,
            'all' => self::All,
            '' => self::All,
            default => null
        };
    }

    public static function isValid(string $name): bool {
        foreach (self::cases() as $case) {
            if ($case->value === $name) {
                return true;
            }
        }
        return false;
    }

    public static function isValidCategory(string $name): bool {
        switch ($name) {
            case self::Post->value:
            case self::Product->value:
                return true;
            default:
                return false;
        }
    }

    public static function isCategorized(Category $category): bool {
        switch ($category->value) {
            case self::Post->value:
            case self::Product->value:
                return true;
            default:
                return false;
        }
    }
}

class CategoryModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getCategories(Category $categoryType = Category::All) {
        if (Category::isCategorized($categoryType)) {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE type = ?");
            $stmt->execute([$categoryType->value]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $stmt = $this->db->prepare("SELECT * FROM categories");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getCategoryByName(string $name, Category $type) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE name = ? AND type = ?");
        $stmt->execute([$name, $type->value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoryById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}