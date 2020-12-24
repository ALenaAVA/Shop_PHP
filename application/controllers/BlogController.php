<?php

namespace application\controllers;

use application\core\Controller;

class BlogController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function indexAction()
    {
        $vars = [
           'newsList' => $this->model->getBlogList(),
        ];
        $this->view->render('News', $vars);
        return true;
    }

    public function viewAction()
    {
        if (!$this->model->isBlogExists($this->route['id'])) {
            $this->view->errorCode(404);
        }

        $vars = [
         'newsItem' => $this->model->getNewsItemById($this->route['id']),
        ];
        $this->view->render('View', $vars);
        return true;
    }
}