<?php
require_once __DIR__ . '/../models/ContactModel.php';
class ContactController {
    private $model;
    public function __construct() {
        $this->model = new ContactModel();
    }
    // =========================
    // 📌 4. Xử lý submit contact (user gửi)
    // =========================
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Content-Type: application/json; charset=utf-8');
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phoneNumber'] ?? '');
        $question = trim($_POST['question'] ?? '');
        $errors = [];
        // NAME
        if ($name === '') {
            $errors['name'] = "Tên không được để trống";
        } elseif (mb_strlen($name) < 2) {
            $errors['name'] = "Tên phải từ 2 ký tự";
        }
        // EMAIL
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không hợp lệ";
        }
        // PHONE
        if (($phone !== '' && !preg_match('/^[0-9]{9,11}$/', $phone))|| $phone === '') {
            $errors['phoneNumber'] = "SĐT không hợp lệ";
        }
        // QUESTION
        if ($question === '') {
            $errors['question'] = "Câu hỏi không được để trống";
        } elseif (mb_strlen($question) < 5) {
            $errors['question'] = "Câu hỏi quá ngắn";
        }
        if (!empty($errors)) {
            echo json_encode([
                "status" => "error",
                "errors" => $errors
            ]);
            exit;
        }
        $this->model->create($name, $email, $phone, $question);
        echo json_encode([
            "status" => "success",
            "message" => "Gửi thành công!"
        ]);
        exit;
        }
    }
}

