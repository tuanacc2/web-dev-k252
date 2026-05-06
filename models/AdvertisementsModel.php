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

    public function getById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM advertisements WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $advertisement = $stmt->fetch(PDO::FETCH_ASSOC);
        return $advertisement ?: null;
    }



    public function create(array $data): bool {
        $stmt = $this->db->prepare(
            "INSERT INTO advertisements (leftImage, thumbnail, title, content, link, textColor, backgroundColor)
             VALUES (:leftImage, :thumbnail, :title, :content, :link, :textColor, :backgroundColor)"
        );
        $stmt->bindValue(':leftImage', $data['leftImage'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':thumbnail', $data['thumbnail'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':title', $data['title'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':content', $data['content'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':link', $data['link'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':textColor', $data['textColor'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':backgroundColor', $data['backgroundColor'] ?? null, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateById(int $id, array $data): bool {
        $stmt = $this->db->prepare(
            "UPDATE advertisements
             SET leftImage = :leftImage,
                 thumbnail = :thumbnail,
                 title = :title,
                 content = :content,
                 link = :link,
                 textColor = :textColor,
                 backgroundColor = :backgroundColor
             WHERE id = :id"
        );
        $stmt->bindValue(':leftImage', $data['leftImage'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':thumbnail', $data['thumbnail'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':title', $data['title'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':content', $data['content'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':link', $data['link'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':textColor', $data['textColor'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':backgroundColor', $data['backgroundColor'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteById(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM advertisements WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}