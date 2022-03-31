<?php
namespace Core\Routeur;

use Core\Request\Request;
use App\Controller\ErrorController;
use App\Controller\CategorieController;

class Routeur {

    public static function Routes (){
        try {
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
                        throw new \Exception("La page recherchée n'existe pas", 1);
                        break;
                }
            } else {
                (new CategorieController)->index();
            }
        } catch (\Exception $e) {
            (new ErrorController)->error($e->getMessage());
        }
    }
}