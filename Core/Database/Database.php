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

    /**
     * Récupère les informations en BDD
     *
     * @param string $statement
     * @param string $className
     * @param boolean $one
     * @return array<object>|object
     */
    public function getData (string $statement, string $className, bool $one = false): array|object
    {
        $query = $this->pdo->query($statement);
        if ($one) {
            // FETCH_CLASS permet d'associer les données reçues à une entité passé en 2nd paramètre
            // On associe ainsi les restrictions liées aux propriétés de la class.
            return $query->fetch(\PDO::FETCH_CLASS, "App\Entity\\$className");
        } else {
            return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\\$className");
        }
    }

    /**
     * Ajoute ou met à jour des données en BDD
     *
     * @param string $statement
     * @param array $data
     * @return boolean
     */
    public function saveData (string $statement, array $data): bool
    {
        // On encode les données pour éviter d'enregistrer du code en BDD
        $verifyData = $this->verifyData($data);
        $prepare = $this->pdo->prepare($statement);
        return $prepare->execute($verifyData);
    }

    /**
     * Encode les données reçues pour éviter l'injection de script
     *
     * @param array $data
     * @return array
     */
    public function verifyData(array $data): array
    {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }
        return $data;
    }
}