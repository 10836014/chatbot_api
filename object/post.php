<?php
class Post{
 
    // database connection and table name
    private $conn;
    private $table_name = "post";
 
    // object properties
    public $userID;
    public $postID;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readPost(){
    
        // select all query
        $query = "SELECT * FROM post";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>