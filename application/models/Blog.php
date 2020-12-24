<?php


namespace application\models;

use application\core\Model;

class Blog extends Model
{

    public function isBlogExists($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->column('SELECT id FROM news WHERE id = :id', $params);
    }


    public function getNewsItemById($id)
    {
        $id = intval($id);

        $params = [
            'id' => $id,
        ];

        return $this->db->row('SELECT * FROM news WHERE id = :id', $params)[0];
    }

    public function getBlogList()
    {
        return $this->db->row('SELECT * FROM news');
    }
}
