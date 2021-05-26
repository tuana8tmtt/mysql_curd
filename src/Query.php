<?php
namespace tuana8tmt\Curd;
class Query
{   
    public $conn;
    public $sql;
    public $data;
    public function __construct($server, $username, $password, $database)
    {   
        $conn = mysqli_connect($server, $username, $password, $database);
        $this->conn = $conn;
    }
    
    public function select(string $select_options = "*") {

        $query_part = "SELECT ".$select_options;
        $this->sql = $query_part;
        return $this;
    }
    public function delete() {

        $query_part = "DELETE ";
        $this->sql = $query_part;
        return $this;
    }
    public function update($table_name) {
        $query_part = "UPDATE $table_name ";
        $this->sql = $query_part;
        return $this;
    }
    public function set($set_options) {
        foreach($set_options as $key => $value)  
           {  
                $query_part .= $key . "='".$value."', ";  
           }
        $query_part = substr($query_part, 0, -2);  
        $query_part = $this->sql." SET ".$query_part;
        $this->sql = $query_part;
        return $this;

    }
    public function from(string $from_options) {

        $query_part = $this->sql." FROM ".$from_options;
        $this->sql = $query_part;
        return $this;

    }
    public function where(string $where_options) {

        $query_part = $this->sql." WHERE ".$where_options;
        $this->sql = $query_part;
        return $this;
    }
    public function groupBy(string $group_options) {

        $query_part = $this->sql." groupBy ".$group_options;
        $this->sql = $query_part;

    }
    public function get() {
        $result = $this->conn->query($this->sql);
        if ($result->num_rows > 0) {
            $this->$data = $result->fetch_assoc();
            return $this->$data;
        }else {
            return 'No result';
        }
    }
    public function run() {
        $this->conn->query($this->sql);      
        if($this->conn->errno != 0){
            return $this->conn->errno;
        }else {
            return true;
        }
    }

    public function insert($table_name, $data)  
      {  
        $this->sql = "INSERT INTO ".$table_name." (";            
        $this->sql .= implode(",", array_keys($data)) . ') VALUES (';            
        $this->sql .= "'" . implode("','", array_values($data)) . "')";  
        if($this->conn->query($this->sql))  
        {  
            return true;  
        }  
        else  
        {  
            return false;  
        }  
      }
}