<?php
require_once BASE_DIR . '/models/FaqModel.php';

class AdminFaqController {
    private FaqModel $model;

    public function __construct() {
        $this->model = new FaqModel();
    }

    private function respondJson(int $code, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($payload);
        exit;
    }

    // Render admin UI
    public function index(): void {
        $items = $this->model->getAll();
        require BASE_DIR . '/views/admin/faq.php';
    }

    // Save FAQs: accept JSON payload in POST
    public function save(): void {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['status' => 'error', 'message' => 'Method not allowed']);
        }

        // try raw JSON body first
        $input = file_get_contents('php://input');
        $payload = json_decode($input, true);
        if (!is_array($payload) || !isset($payload['faqs'])) {
            // fallback to form field
            $faqsField = $_POST['faqs'] ?? null;
            $payload = $faqsField ? json_decode($faqsField, true) : null;
            if (!is_array($payload)) {
                $this->respondJson(400, ['status' => 'error', 'message' => 'Invalid payload']);
            }
            $items = $payload;
        } else {
            $items = $payload['faqs'];
        }

        // basic validation: ensure each item has id, question, answer
        $clean = [];
        foreach ($items as $i => $row) {
            $id = isset($row['id']) ? (int)$row['id'] : ($i + 1);
            $clean[] = [
                'id' => $id,
                'category' => $row['category'] ?? '',
                'question' => $row['question'] ?? '',
                'answer' => $row['answer'] ?? '',
            ];
        }

        $ok = $this->model->saveAll($clean);
        if (!$ok) {
            $this->respondJson(500, ['status' => 'error', 'message' => 'Failed to write faqs file']);
        }

        $this->respondJson(200, ['status' => 'success', 'message' => 'Saved', 'data' => $clean]);
    }
}
