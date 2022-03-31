<?php
namespace App\Manager;

use Core\Database\Database;
use Core\Traits\DefaultTrait;
use Core\Traits\DataSecureTrait;

class DefaultManager {

    use DataSecureTrait;
    use DefaultTrait;

    protected \PDO|false $pdo;
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->pdo = $this->db->getPdo();
    }

    
}