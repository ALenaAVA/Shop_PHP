<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller{

    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function indexAction()
    {
        $this->view->render('Вход');
    }
}