<?php
// $Id:$ //��������
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$department_id = isset($_POST['department_id']) ? $_POST['department_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$company_name = $subject11["0"];

    // �ලID
    // $sql_select1 = "SELECT name FROM company_info WHERE name = '$company_name'";
    // $ret1 = mysqli_query($conn, $sql_select1);
    // $row1 = mysqli_fetch_array($ret1);
    // $supervise_judge_id = $row1['supervise_judge_id'];
        
    //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //�������ӣ���ȡ��˾ID
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
    
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT * FROM department_info WHERE company_id = '$company_id' && department_id = '$department_id' "; 
    //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //�жϽ�ɫID�Ƿ��Ѵ���
    if ($company_id == $row['company_id'] && $department_id == $row['department_id'] ) { 
    //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } 
    else { 
    //��ɫID�����ڣ��������� //׼��SQL���
        $sql_insert = "INSERT INTO department_info(department_id,name,company_id) VALUES('$department_id','$name','$company_id')"; 
        //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //�ر����ݿ�
    mysqli_close($conn);

 ?>
