<?php
namespace App\Manager;

use App\Manager\DefaultManager;

final class ArticleManager extends DefaultManager{

    private $className = "Article";

    /**
     * Affiche la page d'accueil
     *
     * @return void
     */
    public function index ()
    {
        // 1. On récupère les informations de la BDD

        $result = $this->db->getData("SELECT * FROM article", $this->className);

        // 2. On charge le template
        require ROOT . "/templates/article/index.phtml";
    }

    public function singleArt ()
    {
        // On vérifie que reçoit un id valable pour charger le bon article à afficher
        if (!empty($_GET) && isset($_GET['id']) && is_numeric($_GET['id']) && $_POST['id'] != 0) {
            $article = $this->db->getData("SELECT * FROM article WHERE id=". $_GET['id'], $this->className, true);
            require ROOT . "/templates/article/single.phtml";
        } else {
            // TODO: Renvoyer vers page d'erreur ou page principale
            echo "Erreur dans l'id";
        }
    }
    
    public function saveArt ()
    {
        $success = '';

        $categories = $this->db->getData("SELECT * FROM categorie", $this->className);
        // On vérifie que les données reçues correspondent à ce qu'on attend
        if (
            !empty($_POST) && 
            isset($_POST['title'], $_POST['content'], $_POST['categorie_id']) && 
            !empty($_POST['title']) && !empty($_POST['content']) && is_numeric($_POST['categorie_id']) && 
            $_POST['categorie_id'] != 0
        ) {

            $statement = "INSERT INTO article (title, content, categorie_id, user_id, picture) VALUES (:title, :content, :categorie_id, 1, NULL)";

            if($this->db->saveData($statement, $_POST)) {
                $success = "Enregistrement réussi";
            } else {
                $success = "Une erreur s'est produite. Réessayez.";
            }
        }
        require ROOT . "/templates/article/save.phtml";
    }

    public function updateArt ()
    {
        if (!empty($_GET) && isset($_GET['id']) && is_numeric($_GET['id']) && $_POST['id'] != 0) {
            
            $article = $this->db->getData("SELECT * FROM article WHERE id=". $_GET['id'], $this->className, true);
            $categories = $this->db->getData("SELECT * FROM categorie", $this->className);

            if (
                !empty($_POST) && 
                isset($_POST['title'], $_POST['content'], $_POST['categorie_id']) && 
                !empty($_POST['title']) && !empty($_POST['content']) && is_numeric($_POST['categorie_id']) && 
                $_POST['categorie_id'] != 0
            ) {

                $statement = "
                    UPDATE article SET 
                    title = :title,
                    content = :content,
                    categorie_id = :categorie_id 
                    WHERE id=". $_GET['id'];
                if($this->db->saveData($statement, $_POST)) {
                    $success = "Enregistrement réussi";
                } else {
                    $success = "Une erreur s'est produite. Réessayez.";
                }
            }
            require ROOT . "/templates/article/update.phtml";
        } else {
            // TODO: Renvoyer vers page d'erreur ou page principale
            echo "Erreur dans l'id";
        }
    }

    public function deleteCat ()
    {
        if (!empty($_GET) && isset($_GET['id']) && is_numeric($_GET['id']) && $_POST['id'] != 0) {
            

            $statement = "DELETE FROM article WHERE id=". $_GET['id'];
            if($this->db->saveData($statement, $_POST)) {
                // TODO: success
            } else {
                // TODO: error
            }
        } else {
            // TODO: Renvoyer vers page d'erreur ou page principale
            echo "Erreur dans l'id";
        }
    }
}