<?php

declare(strict_types=1);

namespace App\Entity;

class User
{
    public int $id;

    public string $email;

    public string $firstname;

    public string $lastname;

    public string $password;

    public string $createAt;

    public string $updatedAt;


}