<?php

declare(strict_types=1);

namespace App\Table;

use PDO;
use App\Entity\User;
use App\Core\BaseTable;

class UserTable extends BaseTable
{
   public function findAll(): array
   {
    $request = $this->pdo->prepare("SELECT * FROM users");

    $request->execute();

    $users = $request->fetchAll (PDO::FETCH_CLASS,User::class);

    return $users;

   }

}