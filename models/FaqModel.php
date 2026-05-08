<?php

class FaqModel {
    private string $path;

    public function __construct() {
        $this->path = BASE_DIR . '/data/faqs.json';
    }

    public function getAll(): array {
        if (!is_file($this->path)) return [];
        $json = file_get_contents($this->path);
        $data = json_decode($json, true);
        return is_array($data) ? $data : [];
    }

    public function saveAll(array $items): bool {
        $json = json_encode(array_values($items), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        return (bool) file_put_contents($this->path, $json);
    }
}
