<?php

declare(strict_types=1);

namespace App\Table;

use PDO;
use App\Core\BaseTable;
use App\Entity\Article;

class ArticleTable extends BaseTable
{
    public function findAll():array
    {
      $request = $this->pdo->prepare("SELECT * FROM articles");

      $request->execute();

      $articles = $request->fetchAll (PDO::FETCH_CLASS,Article::class);

       return $articles;

    }
}