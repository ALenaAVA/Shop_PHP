<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Category;
use application\models\Product;
use application\models\User;
use application\lib\Pagination;

class SiteController extends Controller
{

    public $product;
    public  $category;
    public function __construct($route)
    {

        $this->product = new Product;
        $this->category = new Category;
        parent::__construct($route);
    }

    public function indexAction()
    {
        $category = new Category;
        $product = new Product;

        $vars = [
            'categories' => $category->getCategoriesList(),
            'latestProducts' => $product->getLatestProducts(6),
            'sliderProducts' => $product->getRecommendedProduct(),
        ];
        $this->view->render('Index', $vars);
        return true;
    }

    public function aboutAction()
    {
        $this->view->render('About');
        return true;
    }

    public function contactAction()
    {
        $user = new User;
        $userEmail = '';
        $userText = '';
        $userName = '';
        $subject = '';
        $userLName = '';
        $errors = false;
        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            $subject = $_POST['subject'];
            $userLName = $_POST['userLName'];
            $userName = $_POST['userName'];

            // Валидация полей
            if (!$user->checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            if (empty($userText)) {
                $errors[] = 'Введите сообщение';
            }
           // debug($errors);
            if ($errors == false) {
                $adminEmail = 'alenaava123@rambler.ru';
                $message = 'Текст: '.$userText.' От '.$userEmail.' Клиент: '.$userName.' '.$userLName;
                
                mail($adminEmail, $subject, $message);
            }
        }
        $vars = [
            'user' => $user,
            'userEmail' => $userEmail,
            'userText' => $userText,
            'errors' => $errors,
        ];
        // debug($vars);
        $this->view->render('Contacts', $vars);
        return true;
    }

    public function searchAction()
    {
        if (isset($_POST['str'])) {
            $res = $this->product->search($_POST['str']);
            if (!$res)
                $this->view->redirect('/');
        }
        if (isset($_POST['str']) || isset($_SESSION['str'])) {
            $str = '';
            if (!isset($_SESSION['str'])) {
                $_SESSION['str'] = $_POST['str'];
                $str = $_POST['str'];
            } else {
                $_SESSION['str'] = $_POST['str'];
                $str = $_SESSION['str'];
            }


            $total = $this->product->prodCountFound($str);

            //  $result = $this->product->search($_POST['str']);
            $page = $this->product->getPage($this->route);
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT);
            //  debug($this->product->getProductsListFound($_POST['str'],$page, 4));
            $var = [
                'productsFound' => $this->product->getProductsListFound($str, $page, 4),
                'pagination' => $pagination->get(),
                'categories' => $this->category->getCategoriesList(),
            ];
            $this->view->render('Seach', $var);
            return true;
        }
        $this->view->redirect('/');
    }
}
