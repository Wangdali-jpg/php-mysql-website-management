<?php
// $Id:$ //声明变量
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
    $department_name = $subject11["0"];


    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    // 监督ID
    $sql_select1 = "SELECT * FROM department_info WHERE name = '$department_name'";
    $ret1 = mysqli_query($conn, $sql_select1);
    $row1 = mysqli_fetch_array($ret1);
    $department_id = $row1['department_id'];
        
    //准备SQL语句,查询用户名
    $sql_select = "SELECT * FROM location_info WHERE location_id = '$location_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断角色ID是否已存在
    if ($location_id == $row['location_id']){ 
    //角色ID已存在，显示提示信息
        header("Location:register.php?err=1");
    } 
    else { 
    //角色ID不存在，插入数据 
    //准备SQL语句
        $sql_insert = "INSERT INTO location_info(location_id,name,department_id) VALUES ('$location_id','$name','$department_id')"; 
        //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //关闭数据库
    mysqli_close($conn);

 ?>
