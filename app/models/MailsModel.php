<?php

class MailsModel{

    private $db;
    private $tableName;

    public function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'mails';
    }

    public function get()
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $result = $this->db->select($sql);
        return $result;
    }

    public function findEmailById($id) 
    {
        $sql = "SELECT * FROM " . $this->tableName .  " WHERE id = '$id' ";
        $result = $this->db->select($sql);

        return $result;
    }

    public function create($subject, $content, $destination, $date)
    {
        $sql = "INSERT INTO " . $this->tableName . " (subject,content,destination,date) VALUES ('$subject', '$content','$destination', '$date')";
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