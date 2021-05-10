<?php

// $Id:$ //声明变量
// $department_id = isset($_POST['department_id']) ? $_POST['department_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$company_name = $subject11["0"];
$department_name = $subject22["0"];
//判断用户ID非空则进行连接

    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); //准备SQL语句,查询用户名
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    $sql_select1 = "SELECT company_id FROM company_info WHERE name = '$company_name'"; //执行SQL语句
    $ret1 = mysqli_query($conn, $sql_select1);
    $row1 = mysqli_fetch_array($ret1);
    $company_id = $row1['company_id'];
    
    $sql_select2 = "SELECT department_id FROM department_info WHERE name = '$department_name' && company_id = '$company_id'"; //执行SQL语句
    $ret2 = mysqli_query($conn, $sql_select2);
    $row2 = mysqli_fetch_array($ret2);
    $department_id = $row2['department_id'];
        
    // UPDATE `department_info` SET `name` = '试验1' WHERE `department_info`.`department_id` = '0002'
    $sql_update = "UPDATE `department_info` SET `name` = '$name' WHERE `department_info`.`department_id` = '$department_id' ";
    // $sql_update = "UPDATE `department_info` SET `name` = '试验1' WHERE `department_info`.`department_id` = '0002'";
    mysqli_query($conn, $sql_update);
        
        
    //更新完成
    //&company_id=$company_id&department_id=$department_id&department_name=$department_name
    header("Location:update.php?err=1");
   
    //关闭数据库
    mysqli_close($conn);


?>
