<?php

declare(strict_types=1);

namespace App\Core;

use Exception;
use Dotenv\Dotenv;



class Configuration
{

    public function __construct(string $envDir)
    
    {
        Dotenv::createImmutable($envDir)->load();

    }

    public function has(string $envVariables): bool
    {

        return isset($_ENV[$envVariables]);
                
    }
    
      public function get($envVariables):mixed
    {

          if ($this->has($envVariables)){
             return $_ENV[$envVariables];
            

        }
        throw new Exception("Error : La variable d'environement $envVariables n'éxsite pas");
    }
    
}