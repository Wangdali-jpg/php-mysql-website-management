<?php

// $Id:$ //声明变量
// $status_id = isset($_POST['status_id']) ? $_POST['status_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$status_id = $subject11["0"];

//判断用户ID非空则进行连接
if (!empty($status_id)) { 
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT * FROM status_info WHERE status_id = '$status_id'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断角色ID是否存在
    if ($status_id == $row['status_id']) { 
    //用户ID存在，进行更新
        
            // $sql_update = "UPDATE status_info SET status_id = '$status_id' name='$name' WHERE status_id = '$status_id' ";
            // UPDATE `status_info` SET `name` = '试验' WHERE `status_info`.`status_id` = '0004'
            $sql_update = "UPDATE `status_info` SET `name` = '$name' WHERE `status_info`.`status_id` = '$status_id'";
            mysqli_query($conn, $sql_update);
        
        
        //更新完成
        header("Location:update.php?err=1");
    } 
    else { 
    //角色ID不存在
        header("Location:update.php?err=3");
    } 
    //关闭数据库
    mysqli_close($conn);
} 
else {
    //角色ID为空
    header("Location:update.php?err=2");
} 

?>
