<?php
namespace Core\Autoload;

/**
 * Class permettant l'auto-chargement des class
 */
class Autoload {

    /**
     * Méthode utilisée par spl_autoload_register pour exécuter les require
     *
     * @param string $classname nom et namespace de la class à charger
     * @return void
     */
    public static function autoloader(string $classname)
    {
        // Remplace les \ du namespace par des /
        $classname = str_replace("\\", "/", $classname);
        // charge le fichier contenant la class
        require_once ROOT. "/$classname.php";
    }

    /**
     * Utilise la fonction spl_autoload_register qui permet l'exécution automatique d'une fonction 
     * à chaque détection de l'utilisation d'une class.
     * 
     * spl_autoload_register prend en 1er paramètre un callback (une fonction qui sera exécutée). 
     * Cette fonction doit avoir en paramètre le nom de la class à charger
     * d'où le passage d'un tableau avec le nom de la class qu'on récupère.
     *
     * @return void
     */
    public static function register ()
    {
        spl_autoload_register(array(__CLASS__, 'autoloader'));
    }

}