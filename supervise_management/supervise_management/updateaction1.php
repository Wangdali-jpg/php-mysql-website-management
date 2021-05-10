<?php

// $Id:$ //声明变量
$supervise_id = isset($_POST['supervise_id']) ? $_POST['supervise_id'] : "";
$begin_time = isset($_POST['begin_time']) ? $_POST['begin_time'] : "";
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : "";
$photo_path = isset($_POST['photo_path']) ? $_POST['photo_path'] : "";

$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$subject33 = isset($_POST['subject3']) ? $_POST['subject3'] : "";

$assign_id = $subject11["0"];
$supervise_judge_name = $subject22["0"];
$feedback_status_name = $subject33["0"];

//判断用户ID非空则进行连接
if (!empty($assign_id)) { 
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT assign_id FROM assignment WHERE assign_id = '$assign_id'"; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断角色ID是否存在
    if ($assign_id == $row['assign_id']) { 
    //用户ID存在，进行更新
        $sql_select1 = "SELECT * FROM supervise_judge_info WHERE name = '$supervise_judge_name'";
        $ret1 = mysqli_query($conn, $sql_select1);
        $row1 = mysqli_fetch_array($ret1);
        $supervise_judge_id = $row1['supervise_judge_id'];
        
        $sql_select2 = "SELECT * FROM feedback_status_info WHERE name = '$feedback_status_name'";
        $ret2 = mysqli_query($conn, $sql_select2);
        $row2 = mysqli_fetch_array($ret2);
        $feedback_status_id = $row2['feedback_status_id'];
        
        if (!empty($assign_id)) {
            $sql_update = "UPDATE supervise SET assign_id='$assign_id' WHERE supervise_id=$supervise_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($begin_time)) {
            $sql_update = "UPDATE supervise SET begin_time='$begin_time' WHERE supervise_id=$supervise_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($end_time)) {
            $sql_update = "UPDATE supervise SET end_time='$end_time' WHERE supervise_id=$supervise_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($photo_path)) {
            $sql_update = "UPDATE supervise SET photo_path='$photo_path' WHERE supervise_id=$supervise_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($supervise_judge_name)) {
            $sql_update = "UPDATE supervise SET supervise_judge_id='$supervise_judge_id' WHERE supervise_id=$supervise_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($feedback_status_name)) {
            $sql_update = "UPDATE supervise SET feedback_status_id='$feedback_status_id' WHERE supervise_id=$supervise_id";
            mysqli_query($conn, $sql_update);
        }

            // $sql_update = "UPDATE assignment SET assign_id = '$assign_id' name='$name' level_id='$level_id' parent_id='$parent_id' assignor_id='$assignor_id' supervisor_id='$supervisor_id' assign_time='$assign_time' begin_time='$begin_time' end_time='$end_time' equipment_id='$equipment_id' status_id='$status_id' 
            // WHERE assign_id = '$assign_id' ";
            mysqli_query($conn, $sql_update);
        
        
        //更新完成
        header("Location:update.php?err=3&assign_id=$assign_id&assignment_name=$assignment_name&level_id=$level_id&parent_id=$parent_id&assignor_id=$assignor_id&supervisor_id=$supervisor_id&assign_time=$assign_time&begin_time=$begin_time&end_time=$end_time&equipment_id=$equipment_id&status_id=$status_id");
    } 
    else { 
    //角色ID不存在
        header("Location:update.php?err=1");
    } 
    //关闭数据库
    mysqli_close($conn);
} 
else {
    //角色ID为空
    header("Location:update.php?err=2");
} 

?>
