<?php
// $Id:$ //��������
// $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$equipment_id = isset($_POST['equipment_id']) ? $_POST['equipment_id'] : "";
$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$equipmentcategory_name = $subject11["0"];
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$location_name = $subject22["0"];

    //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    // �ලID
    $sql_select1 = "SELECT * FROM equipmentcategory_info WHERE name = '$equipmentcategory_name'";
    $ret1 = mysqli_query($conn, $sql_select1);
    $row1 = mysqli_fetch_array($ret1);
    $equipmentcategory_id = $row1['equipmentcategory_id'];
        
    $sql_select2 = "SELECT * FROM location_info WHERE name = '$location_name'";
    $ret2 = mysqli_query($conn, $sql_select2);
    $row2 = mysqli_fetch_array($ret2);
    $location_id = $row2['location_id'];
    
    
    
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT * FROM equipment_info WHERE equipment_id = '$equipment_id' "; 
    //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //�жϽ�ɫID�Ƿ��Ѵ���
    if ($equipment_id == $row['equipment_id']){ 
    //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } 
    else { 
    //��ɫID�����ڣ��������� 
    //׼��SQL���
        $sql_insert = "INSERT INTO equipment_info(equipment_id,name,equipmentcategory_id,location_id) VALUES('$equipment_id','$name','$equipmentcategory_id','$location_id')"; 
        //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //�ر����ݿ�
    mysqli_close($conn);

 ?>
