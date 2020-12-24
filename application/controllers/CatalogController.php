<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Category;
use application\models\Product;
use application\lib\Pagination;

class CatalogController extends Controller
{
    public $category;
    public $product;

    public function __construct($route)
    {
        $this->category = new Category;
        $this->product = new Product;
        parent::__construct($route);
    }

    public function indexAction()
    {
        $total = $this->product->prodCountAll();

        $page = $this->product->getPage($this->route);
       // debug($this->route);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT);
       
        $vars = [
            'categories' => $this->category->getCategoriesList(),
            'latestProducts' => $this->product->getProductsListPage($page, 4),
            'pagination' => $pagination->get(),
        ];
        $this->view->render('Index', $vars);
        return true;
    }

    public function categoryAction()
    {
        if (!$this->product->isCategoryExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $total = $this->product->prodCount($this->route['id']);

        $page = $this->product->getPage($this->route);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, $this->route['id']);

        $vars = [
            'pagination' => $pagination->get(),
            'categories' => $this->category->getCategoriesList(),
            'categoryProducts' => $this->product->getProductsListByCategory($this->route['id'], $page),
            'categoryId' => $this->route['id'],
        ];
        $this->view->render('Category', $vars);
        return true;
    }
}
