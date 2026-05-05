<?php



class AdvertisementsModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->conn;
    }

    public function getAll(){
        $stmt = $this->db->prepare("SELECT * FROM advertisements ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHomepageAdvertisements(int $limit = 2) {
        $stmt = $this->db->prepare("SELECT * FROM advertisements ORDER BY id ASC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}