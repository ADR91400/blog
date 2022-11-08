<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

class BaseTable
{
     protected PDO $pdo ;

    public function __construct(PDO $pdo)
    {
       $this->pdo = $pdo;
    }
}