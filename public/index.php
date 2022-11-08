 <?php

use App\Core\View;
use App\Table\UserTable;
use App\Core\Configuration;
use App\Table\ArticleTable;

require __DIR__ .'/../vendor/autoload.php';

// On test si l'on demande un fichier se terminant par les extensions suivante
if (preg_match("/(.css|.png|.jpeg|.js|.gif|.pdf|.mp3|.mp4|.html|.jpg)$/i", $_SERVER['REQUEST_URI'])) {
    // On demande à PHP de ne pas se lancer. Ainsi ce sera le fichier
    // demandé qui sera retourné dans notre navigateur
    return false;
}

$view =new View(__DIR__ . '/../templates');

$config = new Configuration(__DIR__ . '/..');



echo $view->render('hello', ['name' => 'John Doe']);


echo "<p>Est-ce que DATABASE_USER existe ?</p>";

echo "<p>{$config->has('DATABASE_USER')}</p>";

// Affiche le contenue de DATABASE_USER
echo $config->get('DATABASE_USER');



$pdo = new PDO (
    "mysql:host={$config->get('DATABASE_HOST')};
           port={$config->get('DATABASE_PORT')};
           dbname={$config->get('DATABASE_NAME')}",
$config->get('DATABASE_USER'),
$config->get('DATABASE_PASSWORD'),
);

$table = new UserTable($pdo);

$users = $table->findAll();

echo"<h2>Les utilisateurs</h2>";

foreach($users as $user){
    echo"<p>{$user->email}</p>";
}

// J'aimerais afficher tout les articles !!

// 1. Créer l'objet ArticleTable
$articleTable = new ArticleTable($pdo);

// 2. On récupére tout les articles
$articles = $articleTable->findAll();

echo "<h2>Les Articles</h2>";

foreach ($articles as $article) {
    echo "<p>{$article->title}</p>";
}