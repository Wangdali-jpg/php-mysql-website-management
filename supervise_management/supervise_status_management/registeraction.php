<?php
// $Id:$ //��������
$status_id = isset($_POST['status_id']) ? $_POST['status_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT status_id  FROM status_info WHERE status_id = '$status_id' "; //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //�жϽ�ɫID�Ƿ��Ѵ���
    if ($status_id == $row['status_id']) { //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } else { //��ɫID�����ڣ��������� //׼��SQL���
        $sql_insert = "INSERT INTO status_info(status_id,name) VALUES('$status_id','$name')"; //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //�ر����ݿ�
    mysqli_close($conn);

 ?>
