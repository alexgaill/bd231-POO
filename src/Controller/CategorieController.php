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
    public function single ()
    {
        if (!empty($_GET) && isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
            $this->render("categorie/single", [
                "categorie" => $this->model->find($_GET['id'])
            ]);
        } else {
            // TODO: Renvoyer vers page d'erreur ou page principale
            echo "Erreur dans l'id";
        }
    }
}