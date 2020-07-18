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

     $sql="INSERT INTO chatroom (userID, chatRoomID, role, roleName, categoryID, habbitName, habbitContent, habbitStatus, remindTime, completion, rolerPhoto)
             VALUES 
         ('$_POST[userID]','$_POST[chatRoomID]', '$_POST[role]', '$_POST[roleName]', '$_POST[categoryID]', '$_POST[habbitName]','$_POST[habbitContent]','養成中', '$_POST[remindTime]', '$_POST[completion]', '$_POST[rolerPhoto]')";

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
