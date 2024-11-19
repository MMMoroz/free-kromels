<?php

namespace App\Views;

class FrontEndView
{
    private $twig;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('templates/frontend');
        $this->twig = new \Twig\Environment($loader, []);
    }

    public function renderFrontPage($articles)
    {
        echo $this->twig->render('index.twig', compact("articles"));
    }
    public function renderSinglePost($article)
    {
        echo $this->twig->render('article.twig', compact("article"));
    }



}