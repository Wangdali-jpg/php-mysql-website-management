<?php

// $Id:$ //声明变量
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
// $name = isset($_POST['name']) ? $_POST['name'] : "";
// $department_id = isset($_POST['department_id']) ? $_POST['department_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$company_name = $subject11["0"];
$department_name = $subject22["0"];

    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    // $sql_select = "SELECT department_id FROM department_info WHERE department_id = '$department_id' "; 
    //执行SQL语句
    // $ret = mysqli_query($conn, $sql_select);
    // $row = mysqli_fetch_array($ret); 
    
    $sql_select1 = "SELECT company_id FROM company_info WHERE name = '$company_name'"; //执行SQL语句
    $ret1 = mysqli_query($conn, $sql_select1);
    $row1 = mysqli_fetch_array($ret1);
    $company_id = $row1['company_id'];
    
    $sql_select2 = "SELECT department_id FROM department_info WHERE name = '$department_name' && company_id = '$company_id'"; //执行SQL语句
    $ret2 = mysqli_query($conn, $sql_select2);
    $row2 = mysqli_fetch_array($ret2);
    $department_id = $row2['department_id'];
    
     
     //用户名密码正确，显示提示信息
        $sql_delete = "delete from department_info where department_id= '$department_id'";
        mysqli_query($conn, $sql_delete);
        header("Location:delete.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
 ?>
