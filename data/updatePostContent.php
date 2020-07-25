<?php
     
        $con = mysqli_connect("localhost","root","mysqlpassword");

        if (!$con){
            die('Could not connect: ' . mysql_error());
            return json_encode(array('rusult' => '1', 'data' => '伺服器連接失敗'));
        }

        $selected = mysqli_select_db($con, "chatbot") ;
        //mysql_select_db("project", $con);

        $sql="UPDATE post SET content='$_POST[content]'
        WHERE userID='$_POST[userID]' and postID='$_POST[postID]'";

        mysqli_query($con,$sql);

        if (!mysqli_query($con,$sql))
        {
        //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('rusult' => '1', 'data' => '修改貼文內容失敗', 'error' => mysqli_error($con)));
        echo ('Error: ' . mysqli_error($con));
        }else{
        echo json_encode(array('rusult' => '0', 'data' => '修改貼文內容成功'));
        }
        mysqli_close($con)
?>
