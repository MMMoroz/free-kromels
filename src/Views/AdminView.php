<?php

namespace App\Views;

class AdminView
{
    private $twig;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('templates/admin');
        $this->twig = new \Twig\Environment($loader, []);
    }

    public function admin()
    {
        echo $this->twig->render('layout.twig');
    }

}