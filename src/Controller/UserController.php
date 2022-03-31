<?php
namespace App\Controller;

use Core\Interface\UserInterface;
use Core\Controller\DefaultController;
use Core\Interface\CrudControllerInterface;
use Core\Interface\UserControllerInterface;

// Une class peut étendre d'une seule autre class mais peut implémenter plusieurs interfaces
class UserController extends DefaultController implements UserControllerInterface, CrudControllerInterface {


}