<?php

// $Id:$ //声明变量
// $supervise_id = isset($_POST['supervise_id']) ? $_POST['supervise_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$supervise_id = $subject11["0"];

    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT supervise_id FROM supervise WHERE supervise_id = '$supervise_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
     
     //用户名密码正确，显示提示信息
        $sql_delete = "delete from supervise where supervise_id= '$supervise_id'";
        mysqli_query($conn, $sql_delete);
        header("Location:delete.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
 ?>
