<?php
namespace tuana8tmt\Curd;
class Connect
{   
    public function __construct($server, $username, $password, $database)
    {
        $conn = new mysqli($server, $username, $password, $database);
        $conn -> set_charset("utf8");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
}