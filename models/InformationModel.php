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

    /**
     * Fetch one information row by id.
     * Note: method name kept as `getByName` to match existing signature.
     */
    public function getByName(string $name){
        $stmt = $this->db->prepare("SELECT * FROM informations WHERE name = ? LIMIT 1");
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}