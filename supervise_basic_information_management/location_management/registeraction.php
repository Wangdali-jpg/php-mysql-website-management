<?php
// $Id:$ //��������
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
    $department_name = $subject11["0"];


    //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    // �ලID
    $sql_select1 = "SELECT * FROM department_info WHERE name = '$department_name'";
    $ret1 = mysqli_query($conn, $sql_select1);
    $row1 = mysqli_fetch_array($ret1);
    $department_id = $row1['department_id'];
        
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT * FROM location_info WHERE location_id = '$location_id' "; 
    //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //�жϽ�ɫID�Ƿ��Ѵ���
    if ($location_id == $row['location_id']){ 
    //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } 
    else { 
    //��ɫID�����ڣ��������� 
    //׼��SQL���
        $sql_insert = "INSERT INTO location_info(location_id,name,department_id) VALUES ('$location_id','$name','$department_id')"; 
        //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //�ر����ݿ�
    mysqli_close($conn);

 ?>
