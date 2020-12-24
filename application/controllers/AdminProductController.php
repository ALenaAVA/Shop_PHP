<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Product;
use application\models\Category;

class AdminProductController extends Controller
{
    public $product;
    public function __construct($route)
    {
        $this->product = new Product;

        $this->category = new Category;
        parent::__construct($route);
    }

    public function indexAction()
    {
        // Получаем список товаров
        $productsList = $this->product->getProductsList();
        // debug($productsList);
        // Подключаем вид
        $vars = [
            'productsList' => $productsList,
        ];
        $this->view->render('AdminProduct', $vars);
        return true;
    }
    /**
     * Action для страницы "Добавить товар"
     */
    public function createAction()
    {
        // Получаем список категорий для выпадающего списка
        $categoriesList = $this->category->getCategoriesListAdmin();
        $errors = false;
        $options = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поле название товара';
            }
            if (!isset($options['code']) || empty($options['code'])|| !is_numeric($options['code'])) {
                $errors[] = 'Заполните поле артикул товара, это число ';
            }
            if (!isset($options['price']) || empty($options['price'])|| !is_numeric($options['price'])) {
                $errors[] = 'Заполните поле цена товара, это число';
            }
            if (!isset($options['brand']) || empty($options['brand'])) {
                $errors[] = 'Заполните поле производитель товара';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = $this->product->createProduct($options);
                // Если запись добавлена
              //  debug($_FILES);
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                       
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        $this->product->postUploadImage($_FILES["image"]["tmp_name"], $id);
                    }
                };
                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }
      //  debug($options);
        // Подключаем вид
        $vars = [
            'categoriesList' => $categoriesList,
            'errors' => $errors,
            'options'=> $options,
        ];
        $this->view->render('CreateProduct', $vars);

        return true;
    }
    /**
     * Action для страницы "Редактировать товар"
     */
    public function updateAction()
    {
        // Получаем список категорий для выпадающего списка
        $categoriesList = $this->category->getCategoriesListAdmin();
        // Получаем данные о конкретном заказе
        $product = $this->product->getProductById($this->route['id']);
       // debug($product);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            // Сохраняем изменения
            if ($this->product->updateProductById($this->route['id'], $options)) {
                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    $this->product->postUploadImage($_FILES["image"]["tmp_name"], $this->route['id']);                }
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        $vars = [
            'id'=>$this->route['id'],
            'categoriesList'=>$categoriesList,
            'product'=>$product,
        ];
        $this->view->render('UpdateProduct', $vars);
        return true;
    }
    /**
     * Action для страницы "Удалить товар"
     */
    public function deleteAction()
    {
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            $this->product->deleteProductById($this->route['id']);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        $vars = [
            'id' => $this->route['id'],
        ];
        $this->view->render('DeleteProduct', $vars);
        return true;
    }
}
