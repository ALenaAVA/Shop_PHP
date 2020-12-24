<?php

namespace application\models;

use application\core\Model;

class User extends Model
{
    public function register($name, $email, $password)
    {
        $params = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];

        return $this->db->query('INSERT INTO user (name, email, password) '
            . 'VALUES (:name, :email, :password)', $params);
    }

    public function edit($id, $name, $password, $email)
    {
        $params = [
            'id' => $id,
            'name' => $name,
            'password' => $password,
            'email' => $email,
        ];

        return $this->db->query("UPDATE user 
            SET name = :name, password = :password, email = :email 
            WHERE id = :id", $params);
    }


    public function checkUserData($email, $password)
    {
        $params = [
            'email' => $email,
            'password' => $password,
        ];

        $data = $this->db->row('SELECT * FROM user WHERE email = :email AND password = :password', $params);
        // $_SESSION['user'] = $data[0];
        //  debug($_SESSION['user']);
        return $data;
    }

    public function auth($userId)
    {
        $_SESSION['user'] = $userId;
        // debug($_SESSION['user']);
    }

    public function checkLogged()
    {
        // debug($_SESSION['user'][0]);
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user']['id'];
        }
        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     */
    public static function checkPhone($phone)
    {
        $pattern = "/^\+380\d{3}\d{2}\d{2}\d{2}$/";
        if (preg_match($pattern, "+380635290289"))
            return true;
        return false;
    }

    /**
     * Проверяет email
     */
    public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function checkEmailExists($email)
    {
        $params = [
            'email' => $email,
        ];
        return $this->db->column('SELECT COUNT(*) FROM user WHERE email = :email', $params);
    }

    public function getUserById($id)
    {
        if ($id) {

            $params = [
                'id' => $id,
            ];

            return $this->db->row('SELECT * FROM user WHERE id = :id', $params)[0];
        }
    }
}
