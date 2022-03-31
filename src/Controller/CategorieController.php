<?php
namespace App\Controller;

use App\Entity\Categorie;
use App\Model\ArticleModel;
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
                "categorie" => $this->model->find($id),
                "articles" => (new ArticleModel)->findBy(["categorie_id" => $id])
            ]);
    }

    public function save (array $data)
    {
        $success = '';
        if (!empty($data['name'])) {
            $lastCategorie = $this->model->save($data);
            header("Location: ?page=singleCategorie&id=$lastCategorie");
        } else {
            $success = "Le nom de la catégorie n'a pas été renseigné.";
        }

        $this->render("categorie/save", [
            "success" => $success
        ]);
    }

    public function update (int $id, array $data)
    {
        $error = '';
        $categorie = $this->model->find($id);
        if ($categorie) {
            if (
                isset($data['name']) &&
                !empty($data['name'])
            ) {
                $categorie->setName($data['name']);

                $this->model->update($id, $categorie());
                header("Location: ?page=singleCategorie&id=$id");
            } else {
                $error = "Tous les champs ne sont pas remplis.";
            }
        }else {
            throw new \Exception("La catégorie recherchée n'a pas été trouvée");
        }

        $this->render("categorie/update", [
            'categorie' => $categorie,
            'success' => $error
        ]);
    }

    public function delete (int $id)
    {
        $this->model->delete($id);
        header("Location: /");
    }
}