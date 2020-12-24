<?php

namespace application\controllers;

use application\core\Controller;
use application\models\User;
   
class UserController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
    }
    public function registerAction()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;
        $errors = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!$this->model->checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!$this->model->checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!$this->model->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($this->model->checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $result = $this->model->register($name, $email, $password);
                $this->view->redirect('/user/login');

            }
        }
        $vars = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'result' => $result,
            'errors' => $errors
        ];
        $this->view->render('Регистрация', $vars);
        return true;
    }

    public function loginAction()
    {

        $email = '';
        $password = '';
        $errors = false;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Валидация полей
            if (!$this->model->checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!$this->model->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $user = $this->model->checkUserData($email, $password);
           // debug($user);
            if ($user == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                $_SESSION['user'] = $user[0];
                 $this->view->redirect('/cabinet');
            }
        }
        $vars = [
            'email' => $email,
            'password' => $password,
            'errors' => $errors,
        ];

        $this->view->render('Вход', $vars);
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function logoutAction()
    {
        unset($_SESSION["user"]);
        $this->view->redirect('/');
        return true;
    }
}
