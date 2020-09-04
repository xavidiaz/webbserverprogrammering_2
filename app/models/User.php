<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM user");

        $result = $this->db->resultSet();

        return $result;
    }


    public function getOther()
    {
        $this->db->query("SELECT username, firstname, lastname, birthdate, address
        FROM user LEFT JOIN userdata ON userdata.userid = user.id WHERE user.id = id ");

        $result = $this->db->resultSet();

        return $result;
    }
}
