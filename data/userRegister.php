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

     $sql="INSERT INTO user (userID, userName, gender, birthday, email)
             VALUES 
         ('$_POST[userID]','$_POST[userName]', '$_POST[gender]', '$_POST[birthday]', '$_POST[email]')";

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
