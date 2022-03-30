<?php
namespace Core\Model;

use Core\Database\Database;

class DefaultModel extends Database{

    protected $table;
    protected $entity;

    public function findAll()
    {
        return $this->getData("SELECT * FROM $this->table", $this->className);
    }

}