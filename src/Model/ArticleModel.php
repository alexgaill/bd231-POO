<?php
namespace App\Model;

use Core\Model\DefaultModel;

final class ArticleModel extends DefaultModel {
    protected $table = "article";
    protected $entity = "Article";
}