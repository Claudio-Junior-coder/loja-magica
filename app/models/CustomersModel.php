<?php
class CustomersModel{

    private $db;
    private $tableName;

    public function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'customers';
    }

    public function alreadyExists($param)
    {
        $sql = "SELECT id FROM " . $this->tableName . " WHERE email = '$param'";

        $result = $this->db->select($sql);
        return $result;
    }

    public function get()
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $result = $this->db->select($sql);
        return $result;
    }

    public function findCustomerById($id) 
    {
        $sql = "SELECT * FROM " . $this->tableName .  " WHERE id = '$id' ";
        $result = $this->db->select($sql);

        return $result;
    }

    public function getByMail($mail) 
    {
        $sql = "SELECT * FROM " . $this->tableName .  " WHERE email = '$mail' ";
        $result = $this->db->select($sql);

        return $result;
    }

    public function create($name, $email, $order_history, $last_order , $last_order_value)
    {
        $sql = "INSERT INTO " . $this->tableName . " (name,email,order_history,last_order,last_order_value) VALUES ('$name','$email','$order_history', '$last_order', '$last_order_value')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $name, $email, $order_history, $last_order , $last_order_value)
    {
        $sql = "UPDATE " . $this->tableName . " SET name = '$name', email = '$email', order_history = '$order_history', last_order = '$last_order', last_order_value = '$last_order_value' WHERE id = '$id'";
       
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName .  " WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>