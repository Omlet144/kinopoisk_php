<?php
class db{
public $conn;
public function getConn(){
    $this->conn = new mysqli("localhost", "root", "", "kinopoisk");
}

}
?>