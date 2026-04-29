<?php

class ContactModel {
<<<<<<< HEAD
    private PDO $db;
=======
    private $db;
>>>>>>> fe9e72f1d11cf7a39b93a183fdfed1ff65f82720

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM contacts ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

<<<<<<< HEAD
    public function getById(int $id) {
=======
    public function getById($id) {
>>>>>>> fe9e72f1d11cf7a39b93a183fdfed1ff65f82720
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 📌 Thêm contact (form khách gửi)
<<<<<<< HEAD
    public function create(string $name, string $email, string $phone, string $question) {
=======
    public function create($name, $email, $phone, $question) {
>>>>>>> fe9e72f1d11cf7a39b93a183fdfed1ff65f82720
        $stmt = $this->db->prepare("
            INSERT INTO contacts (name, email, phoneNumber, question)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$name, $email, $phone, $question]);
    }

    // 📌 Đánh dấu đã xem
<<<<<<< HEAD
    public function markSeen(int $id) {
=======
    public function markSeen($id) {
>>>>>>> fe9e72f1d11cf7a39b93a183fdfed1ff65f82720
        $stmt = $this->db->prepare("UPDATE contacts SET hasSeen = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // 📌 Đánh dấu đã trả lời
<<<<<<< HEAD
    public function markReplied(int $id) {
=======
    public function markReplied($id) {
>>>>>>> fe9e72f1d11cf7a39b93a183fdfed1ff65f82720
        $stmt = $this->db->prepare("UPDATE contacts SET hasReplied = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // 📌 Xóa contact
<<<<<<< HEAD
    public function delete(int $id) {
=======
    public function delete($id) {
>>>>>>> fe9e72f1d11cf7a39b93a183fdfed1ff65f82720
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
