<?php

class OrdersModel{

    private $db;
    private $tableName;

    public function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'orders';
    }

    public function get()
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $result = $this->db->select($sql);
        return $result;
    }

    public function create($shop_id, $shop_name, $location, $product, $quantity)
    {
        $sql = "INSERT INTO " . $this->tableName . " (shop_id,shop_name,location,product,quantity) VALUES ('$shop_id', '$shop_name', '$location','$product', '$quantity')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>