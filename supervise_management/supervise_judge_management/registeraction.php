<?php
// $Id:$ //声明变量
$supervise_judge_id = isset($_POST['supervise_judge_id']) ? $_POST['supervise_judge_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT supervise_judge_id  FROM supervise_judge_info WHERE supervise_judge_id = '$supervise_judge_id' "; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //判断角色ID是否已存在
    if ($supervise_judge_id == $row['supervise_judge_id']) { //角色ID已存在，显示提示信息
        header("Location:register.php?err=1");
    } else { //角色ID不存在，插入数据 //准备SQL语句
        $sql_insert = "INSERT INTO supervise_judge_info(supervise_judge_id,name) VALUES('$supervise_judge_id','$name')"; //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //关闭数据库
    mysqli_close($conn);

 ?>
