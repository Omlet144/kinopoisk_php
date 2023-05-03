<?php
class db{
    private $conn;

    function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "kinopoisk");
    }
    public function getConn(): mysqli
    {

        return $this->conn;

    }
}
?>