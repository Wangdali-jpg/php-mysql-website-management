<?php
// $Id:$ //声明变量
// $supervise_id = isset($_POST['supervise_id']) ? $_POST['supervise_id'] : "";
// $assign_id = isset($_POST['assign_id']) ? $_POST['assign_id'] : "";
$begin_time = isset($_POST['begin_time']) ? $_POST['begin_time'] : "";
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : "";
// $supervise_judge_id = isset($_POST['supervise_judge_id']) ? $_POST['supervise_judge_id'] : "";
// $feedback_status_id = isset($_POST['feedback_status_id']) ? $_POST['feedback_status_id'] : "";
$photo_path = isset($_POST['photo_path']) ? $_POST['photo_path'] : "";

$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$subject33 = isset($_POST['subject3']) ? $_POST['subject3'] : "";
$subject44 = isset($_POST['subject4']) ? $_POST['subject4'] : "";
    $assign_id = $subject11["0"];
    $supervise_judge_name = $subject22["0"];
    $feedback_status_name = $subject33["0"];
    $supervise_id = $subject44["0"];
    
    if (!empty($supervise_id)) {
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs") or die("连接失败"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT supervise_id FROM supervise WHERE supervise_id = '$supervise_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    //判断角色ID是否已存在
    if ($supervise_id == $row['supervise_id']) { 
        //监管ID存在，进行更新
        
        $sql_select1 = "SELECT supervise_judge_id FROM supervise_judge_info WHERE name = '$supervise_judge_name'";
        $ret1 = mysqli_query($conn, $sql_select1);
        $row1 = mysqli_fetch_array($ret1);
        $supervise_judge_id = $row1['supervise_judge_id'];
        
        $sql_select2 = "SELECT feedback_status_id FROM feedback_status_info WHERE name = '$feedback_status_name'";
        $ret2 = mysqli_query($conn, $sql_select2);
        $row2 = mysqli_fetch_array($ret2);
        $feedback_status_id = $row2['feedback_status_id'];
        
        $sql_select3 = "SELECT * FROM assignment WHERE assign_id = '$assign_id'";
        $ret3 = mysqli_query($conn, $sql_select3);
        $row3 = mysqli_fetch_array($ret3);
        $assign_id = $row3['assign_id'];
        
        $sql_select4 = "SELECT supervise_id FROM supervise WHERE supervise_id = '$supervise_id'";
        $ret4 = mysqli_query($conn, $sql_select4);
        $row4 = mysqli_fetch_array($ret4);
        $supervise_id = $row4['supervise_id'];
        
        if (!empty($assign_id)) {
            // $sql_update = "UPDATE supervise SET assign_id='$assign_id' WHERE supervise_id=$supervise_id";
            $sql_update = "UPDATE `supervise` SET `assign_id` = '$assign_id' WHERE `supervise`.`supervise_id` = '$supervise_id'";
            mysqli_query($conn, $sql_update);
            // $assign_id="3001";
        }
        if (!empty($begin_time)) {
            // $sql_update = "UPDATE supervise SET begin_time='$begin_time' WHERE supervise_id=$supervise_id";
            $sql_update = "UPDATE `supervise` SET `begin_time` = '$begin_time' WHERE `supervise`.`supervise_id` = '$supervise_id'";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($end_time)) {
            // $sql_update = "UPDATE supervise SET end_time='$end_time' WHERE supervise_id=$supervise_id";
            $sql_update = "UPDATE `supervise` SET `end_time` = '$end_time' WHERE `supervise`.`supervise_id` = '$supervise_id'";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($supervise_judge_name)) {
            // $sql_update = "UPDATE supervise SET supervise_judge_id='$supervise_judge_id' WHERE supervise_id=$supervise_id";
            $sql_update = "UPDATE `supervise` SET `supervise_judge_id` = '$supervise_judge_id' WHERE `supervise`.`supervise_id` = '$supervise_id'";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($feedback_status_name)) {
            // $sql_update = "UPDATE supervise SET feedback_status_id='$feedback_status_id' WHERE supervise_id=$supervise_id";
            $sql_update = "UPDATE `supervise` SET `feedback_status_id` = '$feedback_status_id' WHERE `supervise`.`supervise_id` = '$supervise_id'";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($photo_path)) {
            // $sql_update = "UPDATE supervise SET photo_path='$photo_path' WHERE supervise_id=$supervise_id";
            $sql_update = "UPDATE `supervise` SET `photo_path` = '$photo_path' WHERE `supervise`.`supervise_id` = '$supervise_id'";
            mysqli_query($conn, $sql_update);
        }
        // mysqli_query($conn, $sql_update);
        header("Location:update.php?err=1&supervise_id=$supervise_id&assign_id=$assign_id&begin_time=$begin_time&end_time=$end_time&supervise_judge_id=$supervise_judge_id&feedback_status_id=$feedback_status_id&photo_path=$photo_path");
    } 
    else { 
        //监督ID不存在，插入数据 
        //header("Location:update.php?err=3&supervise_id=$supervise_id&assign_id=$assign_id&begin_time=$begin_time&end_time=$end_time&supervise_judge_id=$supervise_judge_id&feedback_status_id=$feedback_status_id&photo_path=$photo_path");
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
