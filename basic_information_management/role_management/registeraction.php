<?php
// $Id:$ //��������
$role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT role_id FROM role_info WHERE role_id = '$role_id'"; //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //�жϽ�ɫID�Ƿ��Ѵ���
    if ($role_id == $row['role_id']) { //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } else { //��ɫID�����ڣ��������� //׼��SQL���
        $sql_insert = "INSERT INTO role_info(role_id,name) VALUES('$role_id','$name')"; //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //�ر����ݿ�
    mysqli_close($conn);

 ?>
