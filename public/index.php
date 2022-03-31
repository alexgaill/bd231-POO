<?php

use App\Controller\CategorieController;

// __DIR__ fait référence au dossier public et dirname(__DIR__) fait référence au dossier parent de public soit le dossier racine
define("ROOT", dirname(__DIR__));
require_once ROOT . "/vendor/autoload.php";

(new CategorieController)->index();