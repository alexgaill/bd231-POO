<?php

require "Class/MathOperation.php";
require "Class/MaClass.php";

/**
 * Pour utiliser une class et générer un objet,
 * on instancie la class: new Class()
 * On peut ensuite utiliser ses propriétés et ses méthodes 
 * en ajoutant une flèche simple et le nom de la prop. ou de la méthode à utiliser:
 * $objet->method();
 */
$math = new MathOperation();
var_dump($math);
echo $math->addition(3, 7, 12);

echo "<br>";
echo "<br>";
echo "<br>";

$maclass = new MaClass();
echo "<br>";
echo $maclass->getProp1();
echo "<br>";
var_dump($maclass);
// $maclass->prop1 = "Au revoir"; // Fatal error: On ne peut pas accéder à la propriété privée hors de la class

/***********************************************************************/

require "Class/Animaux/Mammifere.php";
require "Class/Animaux/Chien.php";
require "Class/Animaux/Chat.php";

$chien = new Chien("Rex", "Chihuahua", "Marron", 3);
var_dump($chien);

echo "<p>J'ai un chien qui s'appelle {$chien->getgetNom()}, qui a {$chien->getAge()} ans.</p>";
echo "<p> Ce chien est un {$chien->getRace()} qui est {$chien->getPelage()}. </p>";

$chien2 = new Chien("Lucky", "Husky", "tacheté noir et blanc", 5);
// $chien2->setRace("Husky");
// $chien2->setAge(5);
// $chien2->setNom("Lucky");
// $chien2->setPelage("tacheté noir et blanc");

echo "<p>J'ai un chien qui s'appelle {$chien2->getNom()}, qui a {$chien2->getAge()} ans.</p>";
echo "<p> Ce chien est un {$chien2->getRace()} qui est {$chien2->getPelage()}. </p>";

echo "<p> Mon chien fait: </p>";
$chien2->cri();
define('TEST', 'VALEURTEST');

/**
 * Exercice: Creer la class chat et générer 2 chats avec des messages à afficher sur l'index.
 * Les chats auront les propriétés suivantes: nom, race, pelage, age et une méthode qui affiche le cri du chat.
 */

/***********************************************************************/

// On définit le chemin principal du projet permettant d'éviter les ../.. pour charger un fichier
define('ROOT', __DIR__);
// On charge l'autoloader
// require_once ROOT. "/Core/Autoload/Autoload.php";

// Avant le système d'autoloading, on pouvait se confronter à la situation suivante:
// Charger 2 fichiers et class ayant le même nom. Du coup l'utilisation provoquait des erreurs.
// require "cours/Revisions2.php";
// require "Revisions2.php";

// L'autoloading a donc été mis en place pour autocharger les class. 
// Afin de faciliter la compréhension, on a ajouté la définition des espaces de nom (namespace) permettant d'indiquer où se situe la class
// Ce namespace s'accompagne de l'utilisation d'un use permettant de préciser quelle class on utilise sur quelle ligne si 2 class ont le même nom.
// On peut également définir un alias à une class pour éviter les erreurs.

use Core\Autoload\Autoload;
use Cours\Revisions2;
use Classe\Revisions2 as IndexRevisions2;

Autoload::register();

echo Revisions2::TYPE_FICHIER;
$index = new IndexRevisions2;
