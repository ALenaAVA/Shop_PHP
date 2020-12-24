<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Order;
use application\models\Product;

class AdminOrderController extends Controller
{
    public $order;
    public $product;
    public function __construct($route)
    {
        $this->product = new Product;
        $this->order = new Order;

        parent::__construct($route);
    }

    public function indexAction()
    {
        // Получаем список заказов
        $ordersList = $this->order->getOrdersList();

        $vars = [
            'ordersList' => $ordersList,
        ];

        $this->view->render('AdminOrder', $vars);
        return true;
    }
    /**
     * Action для страницы "Редактирование заказа"
     */
    public function updateAction()
    {
        $userName =  $userPhone =   $userComment = "";
        $userEmail =  $userAddress =  $userLName =  "";
        // Получаем данные о конкретном заказе
        $order = $this->order->getOrderById($this->route['id']);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $userEmail = $_POST['userEmail'];
            $userAddress = $_POST['userAddress'];
            $userLName = $_POST['userLName'];

            $date = $_POST['date'];
            $status = $_POST['status'];
            // Сохраняем изменения
            $this->order->updateOrderById($this->route['id'], $userName, $userPhone, $userComment,$userEmail,$userAddress,$userLName, $date, $status);
            // Перенаправляем пользователя на страницу управлениями заказами
            //  debug($order['id']);
            header("Location: /admin/order/view/" . $order['id']);
        }
        $vars = [
            'id' => $this->route['id'],
            'order' => $order,
        ];
        // Подключаем вид
        $this->view->render('UpdateOrder', $vars);
        return true;
    }
    /**
     * Action для страницы "Просмотр заказа"
     */
    public function viewAction()
    {
        # code...
        # $this->route['id']

        // Получаем данные о конкретном заказе
        $order = $this->order->getOrderById($this->route['id']);
        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);
        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        // Получаем список товаров в заказе
        $products = $this->product->getProductsByIds($productsIds);
        // Подключаем вид
        $vars = [
            'order' => $order,
            'productsQuantity' => $productsQuantity,
            'products' => $products,
        ];
        $this->view->render('ViewOrder', $vars);
        return true;
    }
    /**
     * Action для страницы "Удалить заказ"
     */
    public function deleteAction()
    {
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            $this->order->deleteOrderById($this->route['id']);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/order");
        }
        // Подключаем вид
        $vars = [
            'id' => $this->route['id'],
        ];

        $this->view->render('DeleteOrder', $vars);
        return true;
    }
}
