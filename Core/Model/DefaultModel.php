<?php
namespace Core\Model;

use Core\Database\Database;

class DefaultModel extends Database{

    protected $table;
    protected $entity;

    /**
     * Retourne toutes lignes d'une table
     *
     * @return array<object>
     */
    public function findAll(): array
    {
        return $this->getData("SELECT * FROM $this->table", $this->entity);
    }

    /**
     * Retourne une ligne d'une table en fonctionde l'id passé
     *
     * @param integer $id
     * @return object
     */
    public function find(int $id): object
    {
        return $this->getData("SELECT * FROM $this->table WHERE id = $id", $this->entity, true);
    }

}