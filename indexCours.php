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