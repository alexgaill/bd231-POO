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

    public function save (Categorie $categorie)
    {
        $error = '';
        if (!empty($categorie->getName())) {
            $lastCategorie = $this->model->save($categorie());
            header("Location: ?page=singleCategorie&id=$lastCategorie");
        } else {
            $error = "Le nom de la catégorie n'a pas été renseigné.";
        }

        $this->render("categorie/save", [
            "error" => $error
        ]);
    }

    public function update (int $id, array $data)
    {
        $error = '';
        $categorie = $this->model->find($id);
        if ($categorie) {
            if (
                isset($data['title'], $data['content'], $data['categorie_id']) &&
                !empty($data['title']) && !empty($data['content']) && !empty($data['categorie_id'])
            ) {
                $categorie->setTitle($data['title'])
                ->setContent($data['content'])
                ->setCategorieId($data['categorieId']);

                $this->update($id, $categorie());
                header("Location: ?page=singleCategorie&id=$id");
            } else {
                $error = "Tous les chmaps ne sont pas remplis.";
            }
        }else {
            throw new \Exception("La catégorie recherchée n'a pas été trouvée");
        }

        $this->render("categorie/update", [
            'categorie' => $categorie,
            'error' => $error
        ]);
    }

    public function delete (int $id)
    {
        $this->delete($id);
        header("Location: /");
    }
}