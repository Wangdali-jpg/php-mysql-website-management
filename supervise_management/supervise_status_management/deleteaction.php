<?php

// $Id:$ //声明变量
// $status_id = isset($_POST['status_id']) ? $_POST['status_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$name = $subject11["0"];
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    
    $sql_select = "SELECT status_id FROM status_info WHERE name = '$name' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    $status_id = $row['status_id'];
    
     
     //用户名密码正确，显示提示信息
     // DELETE FROM `status_info` WHERE `status_info`.`status_id` = '0004';
        $sql_delete = "DELETE FROM `status_info` WHERE `status_info`.`status_id` = '$status_id'";
        mysqli_query($conn, $sql_delete);
        header("Location:delete.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
 ?>
