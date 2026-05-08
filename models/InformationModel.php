<?php



class InformationModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAll(){
        $stmt = $this->db->prepare("SELECT * FROM informations");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM informations WHERE id = :id LIMIT 1");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Fetch one information row by id.
     * Note: method name kept as `getByName` to match existing signature.
     */
    public function getByName(string $name){
        $stmt = $this->db->prepare("SELECT * FROM informations WHERE name = ? LIMIT 1");
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateById(int $id, array $data): bool {
        $stmt = $this->db->prepare(
            "UPDATE informations SET name = :name, type = :type, value = :value WHERE id = :id"
        );
        $stmt->bindValue(':name', $data['name'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':type', $data['type'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':value', $data['value'] ?? '', PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function add(string $name, string $type, string $value): int {
        $stmt = $this->db->prepare("INSERT INTO informations (name, type, value) VALUES (?, ?, ?)");
        $stmt->execute([$name, $type, $value]);
        return (int) $this->db->lastInsertId();
    }
}