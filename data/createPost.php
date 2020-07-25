<?php
     
     $con = mysqli_connect("localhost","root","mysqlpassword");

     /*if ($con){
        echo "result:1"; 
     }*/
     if (!$con){
         die('Could not connect: ' . mysql_error());
         return json_encode(array('rusult' => '1', 'data' => '伺服器連接失敗'));
     }

     $selected = mysqli_select_db($con, "chatbot") ;

     $sql="INSERT INTO post (userID, title, content)
             VALUES 
         ('$_POST[userID]','$_POST[title]', '$_POST[content]')";

     if (!mysqli_query($con,$sql))
     {
     //die 'Error: ' . mysqli_error($con);
     echo json_encode(array('rusult' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
     echo ('Error: ' . mysqli_error($con));
     }else{
     echo json_encode(array('rusult' => '0', 'data' => '添加成功'));
     }
     mysqli_close($con)
?>
