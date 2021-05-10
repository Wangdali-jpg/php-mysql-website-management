<?php
// $Id:$ //声明变量
$feedback_status_id = isset($_POST['feedback_status_id']) ? $_POST['feedback_status_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //准备SQL语句,查询用户名
    $sql_select = "SELECT * FROM feedback_status_info WHERE feedback_status_id = '$feedback_status_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    //判断角色ID是否已存在
    if ($feedback_status_id == $row['feedback_status_id']) { 
    //角色ID已存在，显示提示信息
        header("Location:register.php?err=1");
    } 
    else { 
    //角色ID不存在，插入数据 
    //准备SQL语句
    // INSERT INTO `feedback_status_info` (`feedback_status_id`, `name`) VALUES ('0005', '试验')
        $sql_insert = "INSERT INTO feedback_status_info (feedback_status_id,name) VALUES ('$feedback_status_id','$name')"; 
        //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //关闭数据库
    mysqli_close($conn);

 ?>
