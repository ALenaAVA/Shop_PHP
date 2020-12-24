<?php

namespace application\models;

use application\core\Model;

class Category extends Model
{
    public function getCategoriesList()
    {
        return $this->db->row('SELECT id, name FROM category ORDER BY sort_order ASC');
    }

    public function getCategoriesListAdmin()
    {
        // Запрос к БД
        // debug($this->db->row('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC'));
        return $this->db->row('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    public function createCategory($name, $sortOrder, $status)
    {
        $params = [
            'name' => $name,
            'sort_order' => $sortOrder,
            'status' => $status,
        ];

       // debug($params);
        return $this->db->query('INSERT INTO category (name, sort_order, status) '
            . 'VALUES (:name, :sort_order, :status)', $params);
    }

    public function getCategoryById($id)
    {
        $params = ['id' => $id];
        // Текст запроса к БД
        return $this->db->row('SELECT * FROM category WHERE id = :id', $params)[0];
    }

    public function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $params = [
            'id' => $id,
            'name' => $name,
            'sort_order' => $sortOrder,
            'status' => $status,
        ];

        return $this->db->query("UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id", $params);
    }

    public function deleteCategoryById($id)
    {
        $params = ['id' => $id];
        // Текст запроса к БД
        return $this->db->query('DELETE FROM category WHERE id = :id', $params);
    }
}
