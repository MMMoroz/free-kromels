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

    public function renderFrontPage()
    {
        echo $this->twig->render('blog-details.html');
    }



}