<?php

namespace application\models;

use application\core\Model;
use Imagick;

class Product extends Model
{
    const SHOW_BY_DEFAULT = 4;
    public function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {

        $count = $count + 0;

        $params = [
            'status' => 1,
            'count' => $count,
        ];
        return $this->db->row('SELECT id, name, price, is_new FROM product WHERE status = :status ORDER BY id DESC LIMIT :count', $params);
    }

    public function isProductExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM product WHERE id = :id', $params);
    }

    public function isCategoryExists($id)
    {
        $params = [
            'id' => $id,
            'status' => 1,
        ];
        return $this->db->column('SELECT id FROM category WHERE status= :status AND id = :id', $params);
    }
    public function getProductById($id)
    {
        $id = intval($id);

        $params = [
            'status' => 1,
            'id' => $id,
        ];
        //"SELECT * FROM `product` WHERE `product`.`id` = 34";
        return $this->db->row('SELECT * FROM product WHERE status=:status AND `product`.`id` = :id', $params)[0];
    }

    public function getProductsByIds($ids)
    {
        $in = "";
        foreach ($ids as $i => $item) {
            $key = "id" . $i;
            $in .= ':' . $key . ',';
            $in_params[$key] = $item; // collecting values into key-value array
        }
        $in = rtrim($in, ","); // :id0,:id1,:id2

        return $this->db->row('SELECT * FROM product WHERE status=1 AND id IN (' . $in . ')', $in_params);
    }
    public function prodCount($id)
    {
        $params = [
            'id' => $id,
            'status' => 1,
        ];
        return $this->db->column('SELECT COUNT(id) FROM product where category_id = :id AND status = :status', $params);
    }
    public function prodCountAll()
    {

        return $this->db->column('SELECT COUNT(id) FROM product');
    }
    public function getPage($route)
    {
        if (isset($route['page'])) {
            $pag = $route['page'];
        } else {
            $pag = 1;
        }

        return $pag;
    }

    public function getProductsListByCategory($id = null, $page = 1)
    {
        $id = intval($id);
        $page = intval($page);

        $params = [
            'max' => self::SHOW_BY_DEFAULT,
            'start' => ($page - 1) * self::SHOW_BY_DEFAULT,
            'id' => $id,
            'status' => 1,
        ];

        return $this->db->row('SELECT * FROM product WHERE category_id = :id AND status = :status ORDER BY id ASC LIMIT :max OFFSET :start', $params);
    }

    public function getProductsListFound($str,  $page = 1, $max)
    {
        $page = intval($page);

        $params = [
            'max' => $max,
            'start' => ($page - 1) * self::SHOW_BY_DEFAULT,
            'status' => 1,
            'str' => '%' . $str . '%',
        ];
        //debug($params)

        return $this->db->row("SELECT * FROM product WHERE name LIKE :str AND status = :status LIMIT :max OFFSET :start", $params);
    }

    public function prodCountFound($str)
    {
        $params = [
            'str' => '%' . $str . '%',
        ];

        return $this->db->column("SELECT COUNT(id) FROM product WHERE name LIKE :str", $params);
    }
    public function search($str)
    {
        $params = [
            'str' => '%' . $str . '%',
        ];

        return $this->db->row("SELECT * FROM product WHERE name LIKE :str", $params);
    }
    public function getProductsListPage($page = 1, $max)
    {
        $page = intval($page);

        $params = [
            'max' => $max,
            'start' => ($page - 1) * self::SHOW_BY_DEFAULT,
            'status' => 1,
        ];

        return $this->db->row('SELECT * FROM product WHERE status = :status ORDER BY id ASC LIMIT :max OFFSET :start', $params);
    }

    public function getRecommendedProduct()
    {
        $params = [
            'recommended' => 1,
            'status' => 1,
        ];
        return $this->db->row('SELECT * FROM product WHERE is_recommended = :recommended AND status = :status ORDER BY id DESC', $params);
    }

    public function getProductsList()
    {
        return $this->db->row('SELECT id, name, price, code FROM product ORDER BY id ASC');
    }

    public function createProduct($options)
    {

        $params = [
            'name' => $options['name'],
            'code' => $options['code'],
            'price' => $options['price'],
            'category_id' => $options['category_id'],
            'brand' => $options['brand'],
            'availability' => $options['availability'],
            'description' => $options['description'],
            'is_new' => $options['is_new'],
            'is_recommended' => $options['is_recommended'],
            'status' => $options['status'],
        ];
        // Текст запроса к БД
        $sql = 'INSERT INTO product (name, code, price, category_id, brand, availability, description, is_new, is_recommended, status)'
            . 'VALUES (:name, :code, :price, :category_id, :brand, :availability, :description, :is_new, :is_recommended, :status)';

        if ($this->db->query($sql, $params)) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $this->db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.png';
        // Путь к папке с товарами
        $path = '/public/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.png';
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public function postUploadImage($path, $id)
    {
        // debug($_SERVER['DOCUMENT_ROOT']);
        // $img = new Imagick($path);
        // $img->cropThumbnailImage(300, 500);
        // $img->setImageCompressionQuality(80);
        // $img->writeImage('public/images/products/' . $id . '.jpg');
        // $_SERVER['DOCUMENT_ROOT'] . "/public/images/products/{$id}.jpg"
        move_uploaded_file($path, 'public/images/products/' . $id . '.png');
    }

    public function updateProductById($id, $options)
    {
        $params = [
            'id' => $id,
            'name' => $options['name'],
            'code' => $options['code'],
            'price' => $options['price'],
            'category_id' => $options['category_id'],
            'brand' => $options['brand'],
            'availability' => $options['availability'],
            'description' => $options['description'],
            'is_new' => $options['is_new'],
            'is_recommended' => $options['is_recommended'],
            'status' => $options['status'],

        ];

        // Текст запроса к БД
        $sql = "UPDATE product SET name = :name, 
                code = :code, price = :price, 
                category_id = :category_id, 
                brand = :brand, availability = :availability, 
                description = :description, 
                is_new = :is_new, is_recommended = :is_recommended, 
                status = :status WHERE id = :id";
        return $this->db->query($sql, $params);
    }

    public function deleteProductById($id)
    {
        $params = [
            'id' => $id,
        ];
        // Текст запроса к БД
        $res = $this->db->query('DELETE FROM product WHERE id = :id', $params);
        if ($res) {
            unlink('public/images/products/' . $id . '.jpg');
        }
    }
}
