<?php

// $Id:$ //声明变量
// $feedback_status_id = isset($_POST['feedback_status_id']) ? $_POST['feedback_status_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$feedback_status_id = $subject11["0"];
//判断用户ID非空则进行连接
if (!empty($feedback_status_id)) { 
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); //准备SQL语句,查询用户名
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    $sql_select = "SELECT feedback_status_id FROM feedback_status_info WHERE feedback_status_id = '$feedback_status_id'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断角色ID是否存在
    if ($feedback_status_id == $row['feedback_status_id']) { 
    //用户ID存在，进行更新
        
            // $sql_update = "UPDATE feedback_status_info SET feedback_status_id = '$feedback_status_id' name='$name' WHERE feedback_status_id = '$feedback_status_id' ";
            $sql_update = "UPDATE `feedback_status_info` SET `name` = '$name' WHERE `feedback_status_info`.`feedback_status_id` = '$feedback_status_id'";
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
