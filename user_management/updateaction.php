<?php

// $Id:$ //声明变量
// $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$sex = isset($_POST['sex']) ? $_POST['sex'] : "";
// $department_id = isset($_POST['department_id']) ? $_POST['department_id'] : "";
// $header_id = isset($_POST['header_id']) ? $_POST['header_id'] : "";
// $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$phone1 = isset($_POST['phone1']) ? $_POST['phone1'] : "";
$phone2 = isset($_POST['phone2']) ? $_POST['phone2'] : "";
$qq = isset($_POST['qq']) ? $_POST['qq'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$subject33 = isset($_POST['subject3']) ? $_POST['subject3'] : "";
$subject44 = isset($_POST['subject4']) ? $_POST['subject4'] : "";
    $department_name = $subject11["0"];
    $header_name = $subject22["0"];
    $role_name = $subject33["0"];
    $user_id = $subject44["0"];

//判断用户ID非空则进行连接
if (!empty($user_id)) { 
    //建立连接
    
    require_once('../initial_interface/db_config.php');
    $conn = db_connect();

    $sql_select1 = "SELECT department_id FROM department_info WHERE name = '$department_name'";
    $ret1 = mysqli_query($conn, $sql_select1);
    $row1 = mysqli_fetch_array($ret1);
    $department_id = $row1['department_id'];
    
    $sql_select2 = "SELECT user_id FROM user_info WHERE username = '$header_name'";
    $ret2 = mysqli_query($conn, $sql_select2);
    $row2 = mysqli_fetch_array($ret2);
    $header_id = $row2['user_id'];
    
    $sql_select3 = "SELECT role_id FROM role_info WHERE name = '$role_name'";
    $ret3 = mysqli_query($conn, $sql_select3);
    $row3 = mysqli_fetch_array($ret3);
    $role_id = $row3['role_id'];
    
    $sql_select4 = "SELECT * FROM user_info WHERE user_id = '$user_id'";
    $ret4 = mysqli_query($conn, $sql_select4);
    $row4 = mysqli_fetch_array($ret4);
    $user_id = $row4['user_id'];
    
    //准备SQL语句,查询用户名
    $sql_select = "SELECT user_id FROM user_info WHERE user_id = '$user_id'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断用户ID是否存在
    if ($user_id == $row['user_id']) { 
    //用户ID存在，进行更新
        if (!empty($username)) {
            $sql_update = "UPDATE user_info SET username='$username' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($sex)) {
            $sql_update = "UPDATE user_info SET sex='$sex' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        
        
        
        if (!empty($department_id)) {
            $sql_update = "UPDATE user_info SET department_id='$department_id' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($header_id)) {
            $sql_update = "UPDATE user_info SET header_id='$header_id' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($role_id)) {
            $sql_update = "UPDATE user_info SET role_id='$role_id' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        
        
        
        
        if (!empty($password)) {
            $sql_update = "UPDATE user_info SET password='$password' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($phone1)) {
            $sql_update = "UPDATE user_info SET phone1='$phone1' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($phone2)) {
            $sql_update = "UPDATE user_info SET phone2='$phone2' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($qq)) {
            $sql_update = "UPDATE user_info SET qq='$qq' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($email)) {
            $sql_update = "UPDATE user_info SET email='$email' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        if (!empty($address)) {
            $sql_update = "UPDATE user_info SET address='$address' WHERE user_id=$user_id";
            mysqli_query($conn, $sql_update);
        }
        //更新完成
        header("Location:update.php?err=1");
    } 
    else { 
    //用户ID不存在
        header("Location:update.php?err=3");
    } 
    //关闭数据库
    mysqli_close($conn);
} 
else {
    //用户ID为空
    header("Location:update.php?err=2");
} 

?>
