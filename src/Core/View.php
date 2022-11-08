<?php

declare(strict_types=1);

namespace App\Core;

use Exception;

class View
{
protected string $templateDir;

    public function __construct(string $templateDir)
    {
         $this->templateDir = $templateDir;
    }

    public function render(string $template, array $variables =[]): string

    {
          ob_start();

          extract($variables);

           $filename = "{$this->templateDir}/$template.php";

          if(!file_exists($filename)){

            throw new Exception("Oups, il n'y a pas de template qui correspond à $filename");

          }

          include $filename;

          return ob_get_clean();

    }
    
}