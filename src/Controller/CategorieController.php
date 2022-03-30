<?php
namespace App\Controller;

use App\Model\CategorieModel;

class CategorieController {

     /**
     * Affiche la page d'accueil du
     *
     * @return void
     */
    public function index ()
    {
        $model = new CategorieModel;
        $result = $model->findAll();

        require ROOT . "/templates/categorie/index.phtml";
    }
}