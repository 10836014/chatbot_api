<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../object/category.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $category = new Category($db);
    
    // query products //read()是在object的functionName
    $stmt = $category->read();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $categories_arr=array();
        $categories_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
    
            $category_item=array(
                "categoryID" => $categoryID,
                "category" => $category );

            array_push($categories_arr["records"], $category_item);
        }

        //不要顯使重複的值
        $categories_arr=array_unique($categories_arr);
        
        echo json_encode($categories_arr);

    }
    
    else{
        echo json_encode(
            array("message" => "No categories found.")
        );
        mysql_close($category);
    }
?>