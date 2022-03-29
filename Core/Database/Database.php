<?php
namespace Core\Database;

class Database {

    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    private \PDO|false $pdo;

    public function __construct()
    {
        $this->getConfig();
        $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }

    /**
     * Récupère les infos de connexion à la BDD pour charger les propriétés
     *
     * @return void
     */
    private function getConfig()
    {
        // On vérifie que le fichier de config existe
        if (file_exists(ROOT. "/config/dbConfig.php")) {
            require ROOT. "/config/dbConfig.php";
            // On parcourt le tableau et pour chaque élément on associe la valeur à la propriété du même nom que la clé
            foreach ($dbConfig as $key => $value) {
                $this->$key = $value;
            }
        } else {
            // TODO: Gérer l'erreur d'absence de fichier
        }
    }

    /**
     * Permet d'utiliser la connexion à la BDD
     *
     * @return \PDO|false
     */
    public function getPdo(): \PDO|false
    {
        return $this->pdo;
    }
}