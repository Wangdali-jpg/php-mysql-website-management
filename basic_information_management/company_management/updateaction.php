<?php
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$company_id = $subject11["0"];
// $Id:$ //声明变量
// $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

//判断用户ID非空则进行连接
if (!empty($company_id)) { 
    //建立连接
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();//准备SQL语句,查询用户名
    // $sql_select = "SELECT role_id FROM role_info WHERE role_id = '$role_id'"; //执行SQL语句
    // $ret = mysqli_query($conn, $sql_select);
    // $row = mysqli_fetch_array($ret); 
    

    //角色ID存在，进行更新
        if (!empty($name)) {
            $sql_update = "UPDATE company_info SET name='$name' WHERE company_id=$company_id";
            mysqli_query($conn, $sql_update);
        }
        
        //更新完成
        header("Location:update.php?err=1");
    
     
    //关闭数据库
    mysqli_close($conn);
} 
else {
    //角色ID为空
    header("Location:update.php?err=2");
} 

?>
