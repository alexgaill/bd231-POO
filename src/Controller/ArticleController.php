<?php
namespace App\Controller;

use App\Entity\Article;
use App\Model\ArticleModel;
use App\Model\CategorieModel;
use Core\Controller\DefaultController;

class ArticleController extends DefaultController{

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

     /**
     * Affiche la page d'accueil
     *
     * @return void
     */
    public function index ()
    {
        $this->render("article/index", [
            "articles" => $this->model->findAll()
        ]);
    }

    /**
     * Affiche les détails d'une catégorie
     *
     * @return void
     */
    public function single (int $id)
    {
        $article = $this->model->find($id);
            $this->render("article/single", [
                "article" => $article,
                "categorie" => (new CategorieModel)->findBy(["id" => $article->getCategorieId])
            ]);
    }

    public function save (array $data)
    {
        $error = '';
        if (!empty($data['title']) && !empty($data['content']) && !empty($data['categorie_id'])) {
            $lastArticle = $this->model->save($data);
            header("Location: ?page=singleArticle&id=$lastArticle");
        } else {
            $error = "Le nom de la catégorie n'a pas été renseigné.";
        }

        $this->render("article/save", [
            "error" => $error
        ]);
    }

    public function update (int $id, array $data)
    {
        $error = '';
        $article = $this->model->find($id);
        if ($article) {
            if (
                isset($data['title'], $data['content'], $data['categorie_id']) &&
                !empty($data['title']) && !empty($data['content']) && !empty($data['categorie_id'])
            ) {
                $article->setTitle($data['title'])
                ->setContent($data['content'])
                ->setCategorieId($data['categorieId']);

                $this->model->update($id, $article());
                header("Location: ?page=singleArticle&id=$id");
            } else {
                $error = "Tous les chmaps ne sont pas remplis.";
            }
        }else {
            throw new \Exception("La catégorie recherchée n'a pas été trouvée");
        }

        $this->render("categorie/update", [
            'categorie' => $article,
            'error' => $error
        ]);
    }

    public function delete (int $id)
    {
        $this->model->delete($id);
        header("Location: /");
    }
}