<?php
// $Id:$ //��������
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$sex = isset($_POST['sex']) ? $_POST['sex'] : "";
// $department_id = isset($_POST['department_id']) ? $_POST['department_id'] : "";
// $header_id = isset($_POST['header_id']) ? $_POST['header_id'] : "";
// $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";
// $department_id = "0001";
// $header_id = "123";
// $role_id = "0002";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$phone1 = isset($_POST['phone1']) ? $_POST['phone1'] : "";
$phone2 = isset($_POST['phone2']) ? $_POST['phone2'] : "";
$qq = isset($_POST['qq']) ? $_POST['qq'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$subject33 = isset($_POST['subject3']) ? $_POST['subject3'] : "";

if ($password == $re_password) { 
    //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../initial_interface/db_config.php');
    $conn = db_connect();
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT username FROM user_info WHERE username = '$username'"; 
    //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    $department_name = $subject11["0"];
    $header_name = $subject22["0"];
    $role_name = $subject33["0"];
    
    //�ж��û����Ƿ��Ѵ���
    if ($username == $row['username']) { 
    //�û����Ѵ��ڣ���ʾ��ʾ��Ϣ
         header("Location:register.php?err=1");
        
    } 
    else { 
        //�û��������ڣ��������� 
        // ׼��SQL���
        // $sql_insert = "INSERT INTO user_info(user_id,username,sex,department_id,header_id,role_id,password,phone1,phone2,qq,email,address) 
        // VALUES('$user_id','$username','$sex','$department_id','$header_id','$role_id','$password','$phone1','$phone2','$qq','$email','$address')"; 
        
        // $sql_insert = "INSERT INTO user_info(user_id,username,sex,password,phone1,phone2,qq,email,address) 
        // VALUES('$user_id','$username','$sex','$password','$phone1','$phone2','$qq','$email','$address')"; 
        //ִ��SQL���
        
        
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
        
        //׼��SQL���
        $sql_insert = "INSERT INTO user_info(user_id,username,sex,department_id,header_id,role_id,password,phone1,phone2,qq,email,address) 
        VALUES('$user_id','$username','$sex','$department_id','$header_id','$role_id','$password','$phone1','$phone2','$qq','$email','$address')"; 
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //�ر����ݿ�
    mysqli_close($conn1);
} 
else {
    header("Location:register.php?err=2");
} 
?>
