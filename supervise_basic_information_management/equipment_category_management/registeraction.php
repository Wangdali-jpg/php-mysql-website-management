<?php
// $Id:$ //声明变量
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$department_id = isset($_POST['department_id']) ? $_POST['department_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$company_name = $subject11["0"];

    // 监督ID
    // $sql_select1 = "SELECT name FROM company_info WHERE name = '$company_name'";
    // $ret1 = mysqli_query($conn, $sql_select1);
    // $row1 = mysqli_fetch_array($ret1);
    // $supervise_judge_id = $row1['supervise_judge_id'];
        
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //建立连接，获取公司ID
    $sql_select2 = "SELECT * FROM `company_info` WHERE `name` = '$company_name' "; 
    $ret2 = mysqli_query($conn, $sql_select2);
    if($ret2){
        echo "succ";
    }
    else{
        echo "fail";
    }
    $row2 = mysqli_fetch_array($ret2);
    $company_id = $row2['company_id'];
    
    //准备SQL语句,查询用户名
    $sql_select = "SELECT * FROM department_info WHERE company_id = '$company_id' && department_id = '$department_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断角色ID是否已存在
    if ($company_id == $row['company_id'] && $department_id == $row['department_id'] ) { 
    //角色ID已存在，显示提示信息
        header("Location:register.php?err=1");
    } 
    else { 
    //角色ID不存在，插入数据 //准备SQL语句
        $sql_insert = "INSERT INTO department_info(department_id,name,company_id) VALUES('$department_id','$name','$company_id')"; 
        //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //关闭数据库
    mysqli_close($conn);

 ?>
