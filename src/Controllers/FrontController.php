<?php

namespace App\Controllers;

use App\Models\Article;
use App\Views\FrontEndView;
use Couchbase\View;

class FrontController
{
    private $view;
    private $Article;
    public function __construct()
    {
        $this->view = new FrontEndView();
        $this->Article = new Article();
    }

    public function showSinglePost($id)
    {
       $article = $this->Article->find($id);
       $this->view->renderSinglePost($article);
    }

    public function index()
    {
        $articles = $this->Article->getAll();
        $this->view->renderFrontPage($articles);
    }

}