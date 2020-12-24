<?php

namespace application\controllers;

use application\models\Product;
use application\models\Category;
use application\core\Controller;
use application\models\Cart;
use application\models\User;
use application\models\Order;

class CartController extends Controller
{
    public $cart;
    public $category;
    public $product;
    public $user;
    public $order;
    public function __construct($route)
    {
        $this->cart = new Cart;
        $this->category = new Category;
        $this->product = new Product;
        $this->user = new User;
        $this->order = new Order;
        parent::__construct($route);
    }
    public function indexAction()
    {
        $productsInCart = false;
        $products = [];
        // Получим данные из корзины
        $productsInCart = $this->cart->getProducts();
        $totalPrice = 0;

        if ($productsInCart) {
            // Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);

            $products = $this->product->getProductsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = $this->cart->getTotalPrice($products);
        }
        $vars = [
            'categories' => $this->category->getCategoriesList(),
            'productsInCart' => $productsInCart,
            'products' => $products,
            'totalPrice' => $totalPrice,
        ];

        $this->view->render('Cart', $vars);
        // require_once(ROOT . '/views/cart/index.php');

        return true;
    }

    public function addAction()
    {
        $this->cart->addProduct($this->route['id']);

        // Возвращаем пользователя на страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function addAjaxAction()
    {
        // Добавляем товар в корзину
        echo $this->cart->addProduct($this->route['id']);
        return true;
    }

    public function deleteAction()
    {
        $this->cart->deleteProduct($this->route['id']);


        header("Location: /cart/");
    }

    public function checkoutAction()
    {
        // Статус успешного оформления заказа
        $result = false;
        $errors = false;
        $totalPrice = "";
        $totalQuantity = "";
        $userName =  $userPhone =   $userComment = "";
        $userEmail =  $userAddress =  $userLName =  "";
        $products = [];
        $productsInCart = [];

        // Форма отправлена?
        if (isset($_POST['submit'])) {
            //debug($_POST);
            // Форма отправлена? - Да
            // Считываем данные формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $userEmail = $_POST['userEmail'];
            $userAddress = $_POST['userAddress'];
            $userLName = $_POST['userLName'];

            // Валидация полей

            if (!$this->user->checkName($userName))
                $errors[] = 'Неправильное имя';
            if (!$this->user->checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';
            if (!$this->user->checkName($userLName))
                $errors[] = 'Неправильная фамилия';

            if (!empty($userEmail) && !$this->user->checkEmail($userEmail))
                $errors[] = 'Неправильный email';
            // if (!$this->user->checkEmail($userEmail))
            //     $errors[] = 'Неправильная фамилия';
            // debug($errors);
            // Форма заполнена корректно?
            if ($errors == false) {
                // Форма заполнена корректно? - Да
                // Сохраняем заказ в базе данных
                // Собираем информацию о заказе
                $productsInCart = $this->cart->getProducts();
                if ($this->user->isGuest()) {
                    $userId = false;
                } else {
                    $userId = $this->user->checkLogged();
                }

                // Сохраняем заказ в БД
                $result = $this->order->save($userName, $userPhone, $userComment, $userEmail, $userAddress, $userLName, $userId, $productsInCart);

                if ($result) {
                    // Оповещаем администратора о новом заказе                
                    $adminEmail = 'alenaava123@rambler.ru';
                    $message = "Новый заказ от".$userName;
                    $subject = 'Заказ';
                    mail($adminEmail, $subject, $message);

                    // Очищаем корзину
                    $this->cart->clear();
                }
            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $productsInCart = $this->cart->getProducts();
                $productsIds = array_keys($productsInCart);
                $products = $this->product->getProductsByIds($productsIds);
                $totalPrice = $this->cart->getTotalPrice($products);
                $totalQuantity = $this->cart->countItems();
            }
        } else {
            // Форма отправлена? - Нет
            // Получием данные из корзины      
            $productsInCart = $this->cart->getProducts();

            // В корзине есть товары?
            if ($productsInCart == false) {
                // В корзине есть товары? - Нет
                // Отправляем пользователя на главную искать товары
                header("Location: /");
            } else {
                // В корзине есть товары? - Да
                // Итоги: общая стоимость, количество товаров
                $productsIds = array_keys($productsInCart);
                $products = $this->product->getProductsByIds($productsIds);
                $totalPrice = $this->cart->getTotalPrice($products);
                $totalQuantity = $this->cart->countItems();

                $userName = false;
                $userEmail = false;

                // Пользователь авторизирован?
                if ($this->user->isGuest()) {
                    // Нет
                    // Значения для формы пустые
                } else {
                    // Да, авторизирован                    
                    // Получаем информацию о пользователе из БД по id
                    $userId = $this->user->checkLogged();
                    $user = $this->user->getUserById($userId);

                    // Подставляем в форму
                    $userName = $user['name'];
                    $userEmail = $user['email'];
                }
            }
        }
        $vars = [
            'categories' => $this->category->getCategoriesList(),
            'result' => $result,
            'errors' => $errors,
            'products' => $products,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
            'userName' => $userName,
            'userPhone' => $userPhone,
            'userComment' => $userComment,
            'userEmail' => $userEmail,
            'userAddress' => $userAddress,
            'userLName' => $userLName,
            'productsInCart' => $productsInCart,
        ];

        // debug($vars);
        $this->view->render('Заказ', $vars);
        return true;
    }
}
