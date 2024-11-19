<?php

namespace App\Models;

use PDO;
use App\Core\Helper as h;

class Article
{
    protected $pdo;
    protected $table;
    public function __construct()
    {
        $host = 'localhost';
        $db = 'free-kromels';
        $user = 'admin';
        $pass = 'admin';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";// Mysql
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            //PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $opt);//MySQL PDO connection

        $this->setTable('articles');
    }

    /**
     * @param mixed $table
     */
    public function setTable($table): void
    {
        $this->table = $table;
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM '.$this->table );
        $stmt->execute([]);
        return $stmt->fetchAll();
    }

    public function find($id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM '.$this->table.' WHERE id = :id');
        $stmt->execute([ 'id' => $id ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store( $article): void
    {
        $sql = "INSERT INTO ".$this->table." (id, title, image, content) VALUES (NULL, :title, :image, :content);" ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":title", $article['title'], \PDO::PARAM_STR);
        $stmt->bindValue(":image", $article['image'], \PDO::PARAM_STR);
        $stmt->bindValue(":content", $article['content'], \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update(object|array|null $article)
    {
        $sql = "UPDATE ".$this->table." SET title = :title, image = :image, content = :content  WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $article['id'], \PDO::PARAM_INT);
        $stmt->bindValue(":title", $article['title'], \PDO::PARAM_STR);
        $stmt->bindValue(":image", $article['image'], \PDO::PARAM_STR);
        $stmt->bindValue(":content", $article['content'], \PDO::PARAM_STR);
        $stmt->execute();
    }


}