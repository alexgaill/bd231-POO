<?php
namespace App\Manager;

use DefaultManager;

class CategorieManager extends DefaultManager{

    /**
     * Affiche la page d'accueil du
     *
     * @return void
     */
    public function index ()
    {
        // 1. On récupère les informations de la BDD

        $result = $this->db->getData("SELECT * FROM categorie");

        // 2. On charge le template
        require ROOT . "/templates/categorie/index.phtml";
    }

    public function singleCat ()
    {
        if (!empty($_GET) && isset($_GET['id']) && is_numeric($_GET['id'])) {
            $categorie = $this->db->getData("SELECT * FROM categorie WHERE id=". $_GET['id'], true);
            require ROOT . "/templates/categorie/single.phtml";
        } else {
            // TODO: Renvoyer vers page d'erreur ou page principale
            echo "Erreur dans l'id";
        }
    }

    public function saveCat ()
    {
        $success = '';
        if (!empty($_POST) && isset($_POST['name']) && !empty($_POST['name'])) {

            // $data = $this->verifyData($_POST);

            // $prepare = $this->pdo->prepare("INSERT INTO categorie (name) VALUES (:name)");
            // $prepare->bindParam(":name", $data['name']);

            $statement = "INSERT INTO categorie (name) VALUES (:name)";

            if($this->db->saveData($statement, $_POST)) {
                $success = "Enregistrement réussi";
            } else {
                $success = "Une erreur s'est produite. Réessayez.";
            }
        }
        require ROOT . "/templates/categorie/save.phtml";
    }

    public function updateCat ()
    {
        if (!empty($_GET) && isset($_GET['id']) && is_numeric($_GET['id'])) {
            // $query = $this->pdo->query("SELECT * FROM categorie WHERE id=". $_GET['id']);
            // $categorie = $query->fetch(\PDO::FETCH_OBJ);
            $categorie = $this->db->getData("SELECT * FROM categorie WHERE id=". $_GET['id'], true);

            if (!empty($_POST) && isset($_POST['name']) && !empty($_POST['name'])) {
                // $data = $this->verifyData($_POST);
                // $prepare = $this->pdo->prepare("UPDATE categorie SET name = :name WHERE id=". $_GET['id']);

                $statement = "UPDATE categorie SET name = :name WHERE id=". $_GET['id'];
                if($this->db->saveData($statement, $_POST)) {
                    $success = "Enregistrement réussi";
                } else {
                    $success = "Une erreur s'est produite. Réessayez.";
                }
            }
            require ROOT . "/templates/categorie/update.phtml";
        } else {
            // TODO: Renvoyer vers page d'erreur ou page principale
            echo "Erreur dans l'id";
        }
    }

    public function deleteCat ()
    {
        if (!empty($_GET) && isset($_GET['id']) && is_numeric($_GET['id'])) {
            

            $statement = "DELETE FROM categorie WHERE id=". $_GET['id'];
            if($this->db->saveData($statement, $_POST)) {
                // TODO: success
            } else {
                // TODO: error
            }

            require ROOT . "/templates/categorie/single.phtml";
        } else {
            // TODO: Renvoyer vers page d'erreur ou page principale
            echo "Erreur dans l'id";
        }
    }
}