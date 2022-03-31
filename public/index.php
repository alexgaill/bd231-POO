<?php

use App\Controller\CategorieController;
use Core\Request\Request;

// __DIR__ fait référence au dossier public et dirname(__DIR__) fait référence au dossier parent de public soit le dossier racine
define("ROOT", dirname(__DIR__));
require_once ROOT . "/vendor/autoload.php";

Request::createFromGlobals();

// Routeur => permet de charger les pages désirées en fonction d'un paramètre dans l'url

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $request = new Request;
    switch ($_GET['page']) {
        case 'singleCategorie':
                (new CategorieController)->single($request->query()['id']);
            break;
        case 'saveCategorie':
            (new CategorieController)->save($request->getContent());
            break;
        case 'updateCategorie':
            (new CategorieController)->update($request->query()['id'], $request->getContent());
            break;
        case 'deleteCategorie':
            (new CategorieController)->delete($request->query()['id']);
            break;
        
        default:
            (new CategorieController)->index();
            break;
    }
} else {
    (new CategorieController)->index();
}