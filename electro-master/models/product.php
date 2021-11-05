<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function get10Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY created_at LIMIT 0,10");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }

    public function getLapTop(){
        $sql = self::$connection->prepare("SELECT * FROM products, protypes where protypes.type_id=products.type_id and protypes.type_name like 'Laptop'");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getPhone(){
        $sql = self::$connection->prepare("SELECT * FROM products, protypes where protypes.type_id=products.type_id and protypes.type_name like 'Điện thoại'");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function search($keyword){
        $sql = self::$connection->prepare("SELECT * FROM products where `name` like ?");
        $keyword= "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }

}
