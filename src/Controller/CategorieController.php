<?php
namespace App\Controller;

use App\Model\CategorieModel;
use Core\Controller\DefaultController;

class CategorieController extends DefaultController{

    public function __construct()
    {
        $this->model = new CategorieModel;
    }

     /**
     * Affiche la page d'accueil
     *
     * @return void
     */
    public function index ()
    {
        $this->render("categorie/index", [
            "categories" => $this->model->findAll()
        ]);
    }

    /**
     * Affiche les détails d'une catégorie
     *
     * @return void
     */
    public function single (int $id)
    {
            $this->render("categorie/single", [
                "categorie" => $this->model->find($id)
            ]);
    }
}