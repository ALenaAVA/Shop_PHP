<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Category;

class AdminCategoryController extends Controller
{
    public $category;
    public function __construct($route)
    {
        $this->category = new Category;
        parent::__construct($route);
    }

    /**
     * Action для страницы "Управление категориями"
     */
    public function indexAction()
    {
        // Получаем список категорий
        $categoriesList = $this->category->getCategoriesListAdmin();
        // Подключаем вид

        $vars = [
            'categoriesList' => $categoriesList,
        ];

        $this->view->render('AdminCategory', $vars);
        return true;
    }
    /**
     * Action для страницы "Добавить категорию"
     */
    public function createAction()
    {
        //debug(1);
        // Обработка формы
        $errors = false;
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            // debug($_POST);
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Флаг ошибок в форме

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            if (!is_numeric($sortOrder)) {
                $errors[] = 'Номер должен быть числом';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                $this->category->createCategory($name, $sortOrder, $status);
              
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }
        $var = [
            'errors' => $errors,
        ];

        $this->view->render('CreateCategory', $var);
        return true;
    }
    /**
     * Action для страницы "Редактировать категорию"
     */
    public function updateAction()
    {
        // Получаем данные о конкретной категории
        $category = $this->category->getCategoryById($this->route['id']);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Сохраняем изменения
            $this->category->updateCategoryById($this->route['id'], $name, $sortOrder, $status);
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }
        // debug($category);
        // Подключаем вид
        $vars = ['category' => $category];
        $this->view->render('UpdateCategory', $vars);
        return true;
    }
    /**
     * Action для страницы "Удалить категорию"
     */
    public function deleteAction()
    {
        // debug($this->route['id']);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            $this->category->deleteCategoryById($this->route['id']);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }
        $vars = ['id' => $this->route['id']];
        // Подключаем вид
        $this->view->render('DeleteCategory', $vars);
        return true;
    }
}
