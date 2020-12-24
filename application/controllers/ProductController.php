<?php

namespace application\controllers;

use application\models\Category;
use application\core\Controller;

class ProductController  extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function viewAction()
    {
        $category = new Category;

        if (!$this->model->isProductExists($this->route['id'])) {
            $this->view->errorCode(404);
        }

        $vars = [
            'categories' => $category->getCategoriesList(),
            'product' => $this->model->getProductById($this->route['id']),
        ];

       // debug($vars);
        $this->view->render('View', $vars);
        return true;
    }
}
