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

    public function getDetail() {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);
        $contactModel = new ContactModel();
        // Mark as seen
        $contactModel->markSeen($id);
        // Get contact detail
        $contact = $contactModel->getById($id);
        if (!$contact) {
            http_response_code(404);
            echo json_encode(['error' => 'Contact not found']);
            exit;
        }
        $contact['hasAnswer'] = (int)($contact['hasReplied'] ?? 0);
        echo json_encode($contact);
        exit;
    }

    public function markAnswered() {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);

        if ($id <= 0) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid contact id']);
            exit;
        }

        $contactModel = new ContactModel();
        $updated = $contactModel->markAnswered($id);

        if (!$updated) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to mark contact as answered']);
            exit;
        }

        $contact = $contactModel->getById($id);
        if (!$contact) {
            http_response_code(404);
            echo json_encode(['error' => 'Contact not found']);
            exit;
        }

        $contact['hasAnswer'] = (int)($contact['hasReplied'] ?? 0);
        echo json_encode([
            'status' => 'success',
            'message' => 'Contact marked as answered',
            'contact' => $contact,
        ]);
        exit;
    }
}