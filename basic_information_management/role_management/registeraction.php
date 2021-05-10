<?php
// $Id:$ //声明变量
$role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT role_id FROM role_info WHERE role_id = '$role_id'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //判断角色ID是否已存在
    if ($role_id == $row['role_id']) { //角色ID已存在，显示提示信息
        header("Location:register.php?err=1");
    } else { //角色ID不存在，插入数据 //准备SQL语句
        $sql_insert = "INSERT INTO role_info(role_id,name) VALUES('$role_id','$name')"; //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //关闭数据库
    mysqli_close($conn);

 ?>
