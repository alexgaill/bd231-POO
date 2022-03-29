<?php
namespace App\Manager;

use Core\Database\Database;

class CategorieManager {

    /**
     * Affiche la page d'accueil du
     *
     * @return void
     */
    public function index ()
    {
        // 1. On récupère les informations de la BDD
        $db = new Database;
        $pdo = $db->getPdo();

        $query = $pdo->query("SELECT * FROM categorie");
        $result = $query->fetchAll(\PDO::FETCH_OBJ);

        // 2. On charge le template
        require ROOT . "/templates/categorie/index.phtml";
    }
}