<?php

class ContactModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM contacts ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 📌 Thêm contact (form khách gửi)
    public function create($name, $email, $phone, $question) {
        $stmt = $this->db->prepare("
            INSERT INTO contacts (name, email, phoneNumber, question)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$name, $email, $phone, $question]);
    }

    // 📌 Đánh dấu đã xem
    public function markSeen($id) {
        $stmt = $this->db->prepare("UPDATE contacts SET hasSeen = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // 📌 Đánh dấu đã trả lời
    public function markReplied($id) {
        $stmt = $this->db->prepare("UPDATE contacts SET hasReplied = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // 📌 Xóa contact
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // 📌 Lọc chưa xem
    public function getUnseen() {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE hasSeen = 0 ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // 📌 Lọc chưa trả lờ
    public function getUnreplied() {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE hasReplied = 0 ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
