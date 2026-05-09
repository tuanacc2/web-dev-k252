<?php
require_once BASE_DIR .'/models/AuditLoggerModel.php';
require_once BASE_DIR .'/models/PostModel.php';
require_once BASE_DIR .'/models/ProductModel.php';
require_once BASE_DIR .'/models/ContactModel.php';

class AdminContactController {

    public function contact() {
        $log = (new AuditLoggerModel())->getLogs();
        $contacts = (new ContactModel())->getAll();
        require_once 'views/admin/contact.php';
    }
    private function respondJson(int $statusCode, array $payload): void {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($payload);
        exit;
    }

    public function getDetail(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }
        try {
            $id = (int) ($_GET['id'] ?? 0);
            if ($id <= 0) {
                $this->respondJson(400, ['error' => 'Invalid contact id']);
            }
            $contactModel = new ContactModel();
            // Mark as seen
            $contactModel->markSeen($id);
            // Get contact detail
            $contact = $contactModel->getById($id);
            if (!$contact) {
                $this->respondJson(404, ['error' => 'Contact not found']);
            }
            $contact['hasAnswer'] = (int) ($contact['hasReplied'] ?? 0);
            $this->respondJson(200, $contact);
        } catch (Throwable $e) {
            $this->respondJson(500, [
                'error' => 'Failed to get contact detail'
            ]);
        }
    }


    public function markAnswered(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->respondJson(405, ['error' => 'Method not allowed']);
        }

        try {
            $id = (int) ($_POST['id'] ?? 0);

            if ($id <= 0) {
                $this->respondJson(400, ['error' => 'Invalid contact id']);
            }

            $contactModel = new ContactModel();

            $updated = $contactModel->markAnswered($id);

            if (!$updated) {
                $this->respondJson(500, [
                    'error' => 'Failed to mark contact as answered'
                ]);
            }

            $contact = $contactModel->getById($id);

            if (!$contact) {
                $this->respondJson(404, ['error' => 'Contact not found']);
            }

            $contact['hasAnswer'] = (int) ($contact['hasReplied'] ?? 0);

            $this->respondJson(200, [
                'status' => 'success',
                'message' => 'Contact marked as answered',
                'contact' => $contact,
            ]);
        } catch (Throwable $e) {
            $this->respondJson(500, [
                'error' => 'Failed to mark contact as answered'
            ]);
        }
    }
}