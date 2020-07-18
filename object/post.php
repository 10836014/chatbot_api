<?php
class Post{
 
    // database connection and table name
    private $conn;
    private $table_name = "user";
 
    // object properties
    public $userID;
    public $userName;
    public $gender;
    public $birthday;
    public $email;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
    
        // select all query
        $query = "SELECT * FROM user ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>