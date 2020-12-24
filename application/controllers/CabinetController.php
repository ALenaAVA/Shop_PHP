<?php

namespace application\controllers;

use application\core\Controller;
use application\models\User;

class CabinetController extends Controller
{
    public $user;
    public function __construct($route)
    {
        $this->user = new User;
        parent::__construct($route);
    }

    public function indexAction()
    {
      //  debug($_SESSION['account']);

        // Получаем идентификатор пользователя из сессии
       // debug($this->user->checkLogged());
        $userId = $this->user->checkLogged();

        // Получаем информацию о пользователе из БД
        $user = $this->user->getUserById($userId);
        // debug($user); 
        $vars = [
            'user' => $user,
        ];
        $this->view->render('Cabinet', $vars);

        return true;
    }

    public function editAction()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = $this->user->checkLogged();

        // Получаем информацию о пользователе из БД
        $user = $this->user->getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $email = $user['email'];

        $result = false;
        $errors = false;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            if (!$this->user->checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!$this->user->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (!$this->user->checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $result = $this->user->edit($userId, $name, $password, $email);

                $this->view->redirect('/cabinet');
            }
        }
        $vars = [
            'result' => $result,
            'errors' => $errors,
            'name' => $name,
            'password' => $password,
            'email'=>$email,
        ];
        $this->view->render('Редактирование', $vars);
        //  require_once(ROOT . '/views/cabinet/edit.php');

        return true;
    }
}
