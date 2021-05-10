<?php
// $Id:$ //声明变量
// $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";

// $equipment_id = $subject11["0"];
$name = isset($_POST['name']) ? $_POST['name'] : "";

$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
// $subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
// $subject33 = isset($_POST['subject3']) ? $_POST['subject3'] : "";
    $level_id = $subject11["0"];
    // $location_id = $subject22["0"];
    // $equipmentcategory_name = $subject33["0"];

//判断用户ID非空则进行连接
if (!empty($level_id)) { 
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //准备SQL语句,查询设备类别ID
    // $sql_select = "SELECT * FROM `equipmentcategory_info` WHERE `name` = '$equipmentcategory_name'"; 
    //执行SQL语句
    // $ret = mysqli_query($conn, $sql_select);
    // $row = mysqli_fetch_array($ret); 
    // $equipmentcategory_id = $row['equipmentcategory_id'];
    
    //角色ID存在，进行更新
            //UPDATE `equipment_info` SET `name` = '试验1', `equipmentcategory_id` = '0002', `location_id` = '0002' WHERE `equipment_info`.`equipment_id` = '0002'
            $sql_update = "UPDATE `level_info` SET `name` = '$name' WHERE `level_info`.`level_id` = '$level_id'";
            mysqli_query($conn, $sql_update);
        
        //更新完成
        header("Location:update.php?err=1&equipmentcategory_id=$equipmentcategory_id&equipmentcategory_name=$equipmentcategory_name");
    //关闭数据库
    mysqli_close($conn);
} 
else {
    //角色ID为空
    header("Location:update.php?err=2");
} 

?>
