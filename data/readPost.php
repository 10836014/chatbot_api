<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../object/post.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $post = new Post($db);
    
    // query products
    //---呼叫的function記得改---
    $stmt = $post->readPost();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $posts_arr=array();
        $posts_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
    
            $post_item=array(
                "userID" => $userID,
                "postID" => $postID,
                "title" => $title,
                "content" => $content,
                "created_at" => $created_at,
                "updated_at" => $updated_at
            );

            array_push($posts_arr["records"], $post_item);
        }

        echo json_encode($posts_arr);

    }
    
    else{
        echo json_encode(
            array("message" => "No products found.")
        );
        mysql_close($post);
    }
?>