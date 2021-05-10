<?php

// $Id:$ //声明变量
// $supervise_judge_id = isset($_POST['supervise_judge_id']) ? $_POST['supervise_judge_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$supervise_judge_id = $subject11["0"];
//判断用户ID非空则进行连接
if (!empty($supervise_judge_id)) { 
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //准备SQL语句,查询用户名
    $sql_select = "SELECT supervise_judge_id FROM supervise_judge_info WHERE supervise_judge_id = '$supervise_judge_id'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断角色ID是否存在
    if ($supervise_judge_id == $row['supervise_judge_id']) { 
    //用户ID存在，进行更新
        // UPDATE `supervise_judge_info` SET `name` = '试验1' WHERE `supervise_judge_info`.`supervise_judge_id` = '0004'
            $sql_update = "UPDATE `supervise_judge_info` SET `name` = '$name' WHERE `supervise_judge_info`.`supervise_judge_id` = '$supervise_judge_id' ";
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
