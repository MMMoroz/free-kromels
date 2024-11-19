<?php

namespace App\Controllers;

use App\Views\FrontEndView;
use Couchbase\View;

class FrontController
{
    private $view;
    public function __construct()
    {
        $this->view = new FrontEndView();
    }

    public function home()
    {
        echo 'home';
    }
    public function about()
    {
        echo 'about';
    }
    public function category($name)
    {
        //echo ' category name is ' . $name;
        $this->view->renderFrontPage();
    }

}