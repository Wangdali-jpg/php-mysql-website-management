<?php
// $Id:$ //声明变量
$assign_id = isset($_POST['assign_id']) ? $_POST['assign_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
// $level_id = isset($_POST['level_id']) ? $_POST['level_id'] : "";
$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : "";
// $assignor_id = isset($_POST['assignor_id']) ? $_POST['assignor_id'] : "";
// $supervisor_id = isset($_POST['supervisor_id']) ? $_POST['supervisor_id'] : "";
$assign_time = isset($_POST['assign_time']) ? $_POST['assign_time'] : "";
$begin_time = isset($_POST['begin_time']) ? $_POST['begin_time'] : "";
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : "";
// $equipment_id = isset($_POST['equipment_id']) ? $_POST['equipment_id'] : "";
// $status_id = isset($_POST['status_id']) ? $_POST['status_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$subject33 = isset($_POST['subject3']) ? $_POST['subject3'] : "";
$subject44 = isset($_POST['subject4']) ? $_POST['subject4'] : "";
$subject55 = isset($_POST['subject5']) ? $_POST['subject5'] : "";
$subject66 = isset($_POST['subject6']) ? $_POST['subject6'] : "";

    // $assignment_name = $subject11["0"];
    $level_name = $subject22["0"];
    $assignor_name = $subject33["0"];
    $supervisor_name = $subject44["0"];
    $equipment_name = $subject55["0"];
    $status_name = $subject66["0"];
    
    
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //准备SQL语句,查询用户名
    // $sql_select = "SELECT assign_id FROM assignment WHERE status_id = '$status_id' "; 
    //执行SQL语句
    // $ret = mysqli_query($conn, $sql_select);
    // $row = mysqli_fetch_array($ret); 

    
    //角色ID不存在，插入数据 
    
        $sql_select1 = "SELECT level_id FROM level_info WHERE name = '$level_name'";
        $ret1 = mysqli_query($conn, $sql_select1);
        $row1 = mysqli_fetch_array($ret1);
        $level_id = $row1['level_id'];
        
        $sql_select2 = "SELECT user_id FROM user_info WHERE username = '$assignor_name'";
        $ret2 = mysqli_query($conn, $sql_select2);
        $row2 = mysqli_fetch_array($ret2);
        $assignor_id = $row2['user_id'];
        
        $sql_select3 = "SELECT user_id FROM user_info WHERE username = '$supervisor_name'";
        $ret3 = mysqli_query($conn, $sql_select3);
        $row3 = mysqli_fetch_array($ret3);
        $supervisor_id = $row3['user_id'];
        
        $sql_select4 = "SELECT equipment_id FROM equipment_info WHERE name = '$equipment_name'";
        $ret4 = mysqli_query($conn, $sql_select4);
        $row4 = mysqli_fetch_array($ret4);
        $equipment_id = $row4['equipment_id'];
        
        $sql_select5 = "SELECT status_id FROM status_info WHERE name = '$status_name'";
        $ret5 = mysqli_query($conn, $sql_select5);
        $row5 = mysqli_fetch_array($ret5);
        $status_id = $row5['status_id'];
        
        //准备SQL语句
        $sql_insert = "INSERT INTO assignment(assign_id,name,level_id,parent_id,assignor_id,supervisor_id,assign_time,begin_time,end_time,equipment_id,status_id) 
        VALUES('$assign_id','$name','$level_id','$parent_id','$assignor_id','$supervisor_id','$assign_time','$begin_time','$end_time','$equipment_id','$status_id')"; 
        //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3&assign_id=$assign_id&assignment_name=$assignment_name&level_id=$level_id&parent_id=$parent_id&assignor_id=$assignor_id&supervisor_id=$supervisor_id&assign_time=$assign_time&begin_time=$begin_time&end_time=$end_time&equipment_id=$equipment_id&status_id=$status_id");
     
    //关闭数据库
    mysqli_close($conn);

 ?>
