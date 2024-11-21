<?php

namespace App\Controllers;

use App\Models\Article;
use App\Views\AdminView;

class AdminController
{
    private $view;
    private $Article;
    public function __construct()
    {
        $this->view = new AdminView();
        $this->Article = new Article();
    }

    public function index()
    {
        echo $this->view->admin();
    }

    public function news_red()
    {

    }

}