<?php
/* db_lanesystem.php
 * extend PDO */


class DB extends PDO
{
    public function __construct($dbname = "lanesystem")
    {
        try {
            parent::__construct("mysql:host=localhost;dbname=$dbname;charset=utf8", "root", "");
        } catch (Exception $e) {
            echo "<pre>" . print_r($e, 1) . "</pre>";
        }
    }
}
