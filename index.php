<?php

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