<?php

namespace application\models;

use application\core\Model;

class Order extends Model
{

    public function save($userName, $userPhone, $userComment,$userEmail,$userAddress,$userLName, $userId, $products)
    {
        $products = json_encode($products);

        $params = [
            'user_name' => $userName,
            'user_phone' => $userPhone,
            'user_comment' => $userComment,
            'user_lname' => $userLName,
            'user_address' => $userAddress,
            'user_email' => $userEmail,
            'user_id' => $userId,
            'products' => $products,
        ];

        return  $this->db->query('INSERT INTO product_order (user_name, user_phone, user_comment,user_lname, user_email, user_address, user_id, products)'
            . 'VALUES (:user_name, :user_phone, :user_comment, :user_lname, :user_email, :user_address, :user_id, :products)', $params);
    }

    public function getOrdersList()
    {
        // Получение и возврат результатов
        return $this->db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }


    public function getOrderById($id)
    {
        $params = ['id' => $id];
        // Текст запроса к БД
        return $this->db->row('SELECT * FROM product_order WHERE id = :id', $params)[0];
    }

    public function updateOrderById($id, $userName, $userPhone, $userComment,$userEmail,$userAddress,$userLName, $date, $status)
    {
        $params = [
            'id' => $id,
            'user_name' => $userName,
            'user_phone' => $userPhone,
            'user_comment' => $userComment,
            'user_lname' => $userLName,
            'user_address' => $userAddress,
            'user_email' => $userEmail,
            'date' => $date,
            'status' => $status,
        ];

        // Текст запроса к БД
        $this->db->query("UPDATE product_order SET user_name = :user_name, user_phone = :user_phone, user_comment = :user_comment, user_lname = :user_lname, user_email = :user_email, user_address = :user_address, date = :date, status = :status WHERE id = :id", $params);
    }

    public function deleteOrderById($id)
    {
        $params = ['id' => $id];
        // Текст запроса к БД
        return $this->db->query('DELETE FROM product_order WHERE id = :id',$params);

    }

}
