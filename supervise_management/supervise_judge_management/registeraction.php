<?php
// $Id:$ //��������
$supervise_judge_id = isset($_POST['supervise_judge_id']) ? $_POST['supervise_judge_id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

 //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT supervise_judge_id  FROM supervise_judge_info WHERE supervise_judge_id = '$supervise_judge_id' "; //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //�жϽ�ɫID�Ƿ��Ѵ���
    if ($supervise_judge_id == $row['supervise_judge_id']) { //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } else { //��ɫID�����ڣ��������� //׼��SQL���
        $sql_insert = "INSERT INTO supervise_judge_info(supervise_judge_id,name) VALUES('$supervise_judge_id','$name')"; //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //�ر����ݿ�
    mysqli_close($conn);

 ?>
