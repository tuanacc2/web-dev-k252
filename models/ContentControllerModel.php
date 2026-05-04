<?php

class ContentControllerModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    /**
     * Lấy tất cả content controller entries
     */
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM contentController ORDER BY siteName, elementName");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy content controller theo ID
     */
    public function getById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM contentController WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy tất cả content controller của một site
     */
    public function getBySiteName(string $siteName) {
        $stmt = $this->db->prepare("SELECT * FROM contentController WHERE siteName = ? ORDER BY elementName");
        $stmt->execute([$siteName]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy content controller theo siteName và elementName
     */
    public function getByNamePair(string $siteName, string $elementName) {
        $stmt = $this->db->prepare("SELECT * FROM contentController WHERE siteName = ? AND elementName = ? LIMIT 1");
        $stmt->execute([$siteName, $elementName]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Kiểm tra xem một element có hiển thị trên site hay không
     */
    public function isVisible(string $siteName, string $elementName) {
        $result = $this->getByNamePair($siteName, $elementName);
        return $result ? (bool) $result['isVisible'] : false;
    }

    /**
     * Thêm một content controller entry mới
     */
    public function add(string $siteName, string $elementName, int $isVisible = 1) {
        $stmt = $this->db->prepare("INSERT INTO contentController (siteName, elementName, isVisible) VALUES (?, ?, ?)");
        return $stmt->execute([$siteName, $elementName, $isVisible]);
    }

    /**
     * Cập nhật visibility của một element
     */
    public function updateVisibility(int $id, int $isVisible) {
        $stmt = $this->db->prepare("UPDATE contentController SET isVisible = ? WHERE id = ?");
        return $stmt->execute([$isVisible, $id]);
    }

    /**
     * Cập nhật visibility bằng siteName và elementName
     */
    public function updateVisibilityByName(string $siteName, string $elementName, int $isVisible) {
        $stmt = $this->db->prepare("UPDATE contentController SET isVisible = ? WHERE siteName = ? AND elementName = ?");
        return $stmt->execute([$isVisible, $siteName, $elementName]);
    }

    /**
     * Xóa một content controller entry
     */
    public function delete(int $id) {
        $stmt = $this->db->prepare("DELETE FROM contentController WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Xóa content controller bằng siteName và elementName
     */
    public function deleteByName(string $siteName, string $elementName) {
        $stmt = $this->db->prepare("DELETE FROM contentController WHERE siteName = ? AND elementName = ?");
        return $stmt->execute([$siteName, $elementName]);
    }

    /**
     * Bật/tắt visibility của một element
     */
    public function toggleVisibility(int $id) {
        $current = $this->getById($id);
        if ($current) {
            $newVisibility = $current['isVisible'] ? 0 : 1;
            return $this->updateVisibility($id, $newVisibility);
        }
        return false;
    }
}
