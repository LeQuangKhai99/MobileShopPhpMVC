<?php
class DB{
    public $conn;
    protected $server = "localhost";
    protected $username = "root";
    protected $pass = '';
    protected $database = 'mobileshop';

    function __construct(){
        $this->conn = mysqli_connect($this->server, $this->username, $this->pass, $this->database);
        mysqli_query($this->conn, "SET NAMES 'utf-8'");
    }
}
?>