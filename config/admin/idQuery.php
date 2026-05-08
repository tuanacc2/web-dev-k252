<?php
require_once BASE_DIR . '/database/Database.php';

/**
 * This class provides a method to retrieve the next available ID for a database table.
 * It identifies the "smallest hole" in the ID sequence (e.g., if IDs 1, 2, 4 exist, it returns 3).
 */
class IdQuery {
    /**
     * Retrieves the smallest missing integer in the sequence of existing IDs.
     * * @param string $table The name of the table to check.
     * @return int The next available ID.
     */
    public static function getId(string $table): int {
        $available_id_query = "
            SELECT MIN(t1.id + 1) AS NextID
            FROM $table t1
            LEFT JOIN $table t2 ON t1.id + 1 = t2.id
            WHERE t2.id IS NULL
            UNION
            SELECT 1 AS NextID
            WHERE NOT EXISTS (SELECT 1 FROM $table WHERE id = 1)
            ORDER BY NextID ASC
            LIMIT 1"
        ;

        try {
            $db = Database::getInstance()->conn;
            $result = $db->query($available_id_query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            // Return the found ID, or default to 1 if the table is empty
            return (int)($row['NextID'] ?? 1);
        } catch (PDOException $e) {
            // Fallback for empty tables or errors
            return 1;
        }
    }
}
?>