<?php

// $Id:$ //声明变量
// $feedback_status_id = isset($_POST['feedback_status_id']) ? $_POST['feedback_status_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$name = $subject11["0"];
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //准备SQL语句,查询用户名
    $sql_select = "SELECT * FROM feedback_status_info WHERE name = '$name' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
     
     //用户名密码正确，显示提示信息
        $sql_delete = "delete from feedback_status_info where name= '$name'";
        mysqli_query($conn, $sql_delete);
        header("Location:delete.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
 ?>
