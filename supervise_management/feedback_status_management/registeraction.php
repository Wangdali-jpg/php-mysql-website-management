<?php
// $Id:$ //��������
$feedback_status_id = isset($_POST['feedback_status_id']) ? $_POST['feedback_status_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT * FROM feedback_status_info WHERE feedback_status_id = '$feedback_status_id' "; 
    //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    //�жϽ�ɫID�Ƿ��Ѵ���
    if ($feedback_status_id == $row['feedback_status_id']) { 
    //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } 
    else { 
    //��ɫID�����ڣ��������� 
    //׼��SQL���
    // INSERT INTO `feedback_status_info` (`feedback_status_id`, `name`) VALUES ('0005', '����')
        $sql_insert = "INSERT INTO feedback_status_info (feedback_status_id,name) VALUES ('$feedback_status_id','$name')"; 
        //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } 
    //�ر����ݿ�
    mysqli_close($conn);

 ?>
