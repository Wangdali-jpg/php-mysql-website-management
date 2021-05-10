<?php
// $Id:$ //声明变量
// $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";

$name = isset($_POST['name']) ? $_POST['name'] : "";

$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
    $location_id = $subject11["0"];
    $department_name = $subject22["0"];

//判断用户ID非空则进行连接
if (!(empty($department_name)) || !(empty($name)) ) { 
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //准备SQL语句,查询设备类别ID
    $sql_select = "SELECT * FROM `department_info` WHERE `name` = '$department_name'"; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    $department_id = $row['department_id'];
    
    //角色ID存在，进行更新
        if(!empty($name)){
            //UPDATE `equipment_info` SET `name` = '试验1', `equipmentcategory_id` = '0002', `location_id` = '0002' WHERE `equipment_info`.`equipment_id` = '0002'
            $sql_update = "UPDATE `location_info` SET `name` = '$name' WHERE `location_info`.`location_id` = '$location_id'";
            mysqli_query($conn, $sql_update);
        }
        if(!empty($department_id)){
            //UPDATE `equipment_info` SET `name` = '试验1', `equipmentcategory_id` = '0002', `location_id` = '0002' WHERE `equipment_info`.`equipment_id` = '0002'
            $sql_update = "UPDATE `location_info` SET `department_id` = '$department_id' WHERE `location_info`.`location_id` = '$location_id'";
            mysqli_query($conn, $sql_update);
        }
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
