<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method array<Categorie> findAll()
 * @method Categorie find(int $id)
 */
class CategorieModel extends DefaultModel{

    protected $table = "categorie";
    protected $entity = "Categorie";
}