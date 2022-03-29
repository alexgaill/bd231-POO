<?php
// On définit le chemin principal du projet permettant d'éviter les ../.. pour charger un fichier
define('ROOT', __DIR__);
// On charge l'autoloader
require_once ROOT. "/Core/Autoload/Autoload.php";

// Avant le système d'autoloading, on pouvait se confronter à la situation suivante:
// Charger 2 fichiers et class ayant le même nom. Du coup l'utilisation provoquait des erreurs.
// require "cours/Revisions2.php";
// require "Revisions2.php";

// L'autoloading a donc été mis en place pour autocharger les class. 
// Afin de faciliter la compréhension, on a ajouté la définition des espaces de nom (namespace) permettant d'indiquer où se situe la class
// Ce namespace s'accompagne de l'utilisation d'un use permettant de préciser quelle class on utilise sur quelle ligne si 2 class ont le même nom.
// On peut également définir un alias à une class pour éviter les erreurs.

use Core\Autoload\Autoload;
use cours\Revisions2;
use Revisions2 as IndexRevisions2;

Autoload::register();

echo Revisions2::TYPE_FICHIER;
$index = new IndexRevisions2;

