<?php

use Core\Database\Database;

class DefaultManager {

    protected \PDO|false $pdo;
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->pdo = $this->db->getPdo();
    }

        /**
     * Encode les données reçues pour éviter l'injection de script
     *
     * @param array $data
     * @return array
     */
    public function verifyData(array $data): array
    {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }
        return $data;
    }
}