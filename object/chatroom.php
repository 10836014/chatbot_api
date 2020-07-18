<?php
class chatroom{
 
    // database connection and table name
    private $conn;
    private $table_name = "chatroom";
 
    // object properties
    public $userID;
    public $chatRoomID;
    public $role;
    public $roleName;
    public $habbitName;
    public $habbitContent;
    public $habbitStatus;
    public $remindTime; //提醒時間 00:00:00
    public $completion; //完成次數 default=0
    public $crated_at;  //建立時間 timesteamps
    public $rolePhoto;  //角色照片
    public $categoryID; //習慣分類ID
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readChatRoom(){
    
        // select all query
        $query = "SELECT * FROM chatroom ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }

    function selectChatroomID(){
    
        // select all query
        $query="SELECT * FROM `chatRoom` WHERE userID='$_POST[userID]' ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }

    function readCompletion(){
    
        // select all query
        $query="SELECT * FROM `chatRoom` WHERE userID='$_POST[userID]' AND habbitStatus='養成中' ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}
?>
