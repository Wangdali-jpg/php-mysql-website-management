<?php
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$name = $subject11["0"];
// $Id:$ //声明变量
// $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";


    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs");
require_once('../../initial_interface/db_config.php');
    $conn = db_connect();    
    //准备SQL语句,查询用户名
    // $sql_select = "SELECT name FROM role_info WHERE name = '$subject11' "; 
    //执行SQL语句
    // $ret = mysqli_query($conn, $sql_select);
    // $row = mysqli_fetch_array($ret); 
    
     
     //用户名密码正确，显示提示信息
        $sql_delete = "delete from equipmentcategory_info where name= '$name'";
        mysqli_query($conn, $sql_delete);
        header("Location:delete.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
 ?>
