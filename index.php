<?php

use App\Manager\CategorieManager;
use Core\Database\Database;

define("ROOT", __DIR__);
require_once ROOT . "/vendor/autoload.php";

(new CategorieManager)->index();