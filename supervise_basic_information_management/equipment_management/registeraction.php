<?php
// $Id:$ //声明变量
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$equipment_id = isset($_POST['equipment_id']) ? $_POST['equipment_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$equipmentcategory_name = $subject11["0"];
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$location_name = $subject22["0"];

    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    // 监督ID
    $sql_select1 = "SELECT * FROM equipmentcategory_info WHERE name = '$equipmentcategory_name'";
    $ret1 = mysqli_query($conn, $sql_select1);
    $row1 = mysqli_fetch_array($ret1);
    $equipmentcategory_id = $row1['equipmentcategory_id'];
        
    $sql_select2 = "SELECT * FROM location_info WHERE name = '$location_name'";
    $ret2 = mysqli_query($conn, $sql_select2);
    $row2 = mysqli_fetch_array($ret2);
    $location_id = $row2['location_id'];
    
    
    
    //准备SQL语句,查询用户名
    $sql_select = "SELECT * FROM equipment_info WHERE equipment_id = '$equipment_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断角色ID是否已存在
    if ($equipment_id == $row['equipment_id']){ 
    //角色ID已存在，显示提示信息
        header("Location:register.php?err=1");
    } 
    else { 
    //角色ID不存在，插入数据 
    //准备SQL语句
        $sql_insert = "INSERT INTO equipment_info(equipment_id,name,equipmentcategory_id,location_id) VALUES('$equipment_id','$name','$equipmentcategory_id','$location_id')"; 
        //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //关闭数据库
    mysqli_close($conn);

 ?>
