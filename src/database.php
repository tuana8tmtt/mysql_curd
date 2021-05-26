<?php
namespace tuana8tmt\Curd;
class Database{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "curd";
    public $con;
    public function Connect(){
        $conn = new mysqli($server, $username, $password, $database);
        $conn -> set_charset("utf8");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
}
?>