<?php
// $Id:$ //��������
$company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT company_id FROM company_info WHERE company_id = '$company_id'"; //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //�жϽ�ɫID�Ƿ��Ѵ���
    if ($company_id == $row['company_id']) { //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } else { //��ɫID�����ڣ��������� //׼��SQL���
        $sql_insert = "INSERT INTO company_info(company_id,name) VALUES('$company_id','$name')"; //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //�ر����ݿ�
    mysqli_close($conn);

 ?>
