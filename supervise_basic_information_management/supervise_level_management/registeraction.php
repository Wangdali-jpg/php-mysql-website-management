<?php
// $Id:$ //��������
$level_id = isset($_POST['level_id']) ? $_POST['level_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT level_id  FROM level_info WHERE level_id = '$level_id' "; //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //�жϽ�ɫID�Ƿ��Ѵ���
    if ($level_id == $row['level_id']) { //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } else { //��ɫID�����ڣ��������� //׼��SQL���
        $sql_insert = "INSERT INTO level_info (level_id,name) VALUES('$level_id','$name')"; //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //�ر����ݿ�
    mysqli_close($conn);

 ?>
