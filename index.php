<?php

use App\Manager\CategorieManager;

define("ROOT", __DIR__);
require_once ROOT . "/vendor/autoload.php";

(new CategorieManager)->updateCat();