<?php
// $Id:$ //��������
$supervise_id = isset($_POST['supervise_id']) ? $_POST['supervise_id'] : "";
// $assign_id = isset($_POST['assign_id']) ? $_POST['assign_id'] : "";
$begin_time = isset($_POST['begin_time']) ? $_POST['begin_time'] : "";
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : "";
// $supervise_judge_id = isset($_POST['supervise_judge_id']) ? $_POST['supervise_judge_id'] : "";
// $feedback_status_id = isset($_POST['feedback_status_id']) ? $_POST['feedback_status_id'] : "";
$photo_path = isset($_POST['photo_path']) ? $_POST['photo_path'] : "";

$subject11 = isset($_POST['subject1']) ? $_POST['subject1'] : "";
$subject22 = isset($_POST['subject2']) ? $_POST['subject2'] : "";
$subject33 = isset($_POST['subject3']) ? $_POST['subject3'] : "";
    $assign_id = $subject11["0"];
    $supervise_judge_name = $subject22["0"];
    $feedback_status_name = $subject33["0"];
    
    
    //��������
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //׼��SQL���,��ѯ�û���
    $sql_select = "SELECT supervise_id  FROM supervise WHERE supervise_id = '$supervise_id' "; 
    //ִ��SQL���
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    //�жϽ�ɫID�Ƿ��Ѵ���
    if ($supervise_id == $row['supervise_id']) { 
        //��ɫID�Ѵ��ڣ���ʾ��ʾ��Ϣ
        header("Location:register.php?err=1");
    } 
    else { 
        //��ɫID�����ڣ��������� 
        //�ලID
        $sql_select1 = "SELECT supervise_judge_id FROM supervise_judge_info WHERE name = '$supervise_judge_name'";
        $ret1 = mysqli_query($conn, $sql_select1);
        $row1 = mysqli_fetch_array($ret1);
        $supervise_judge_id = $row1['supervise_judge_id'];
        
        //����״̬ID
        $sql_select2 = "SELECT feedback_status_id FROM feedback_status_info WHERE name = '$feedback_status_name'";
        $ret2 = mysqli_query($conn, $sql_select2);
        $row2 = mysqli_fetch_array($ret2);
        $feedback_status_id = $row2['feedback_status_id'];
        
        //׼��SQL���
        $sql_insert = "INSERT INTO supervise(supervise_id,assign_id,begin_time,end_time,supervise_judge_id,feedback_status_id,photo_path) 
        VALUES('$supervise_id','$assign_id','$begin_time','$end_time','$supervise_judge_id','$feedback_status_id','$photo_path')"; 
        //ִ��SQL���
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3&supervise_id=$supervise_id&assign_id=$assign_id&begin_time=$begin_time&end_time=$end_time&supervise_judge_id=$supervise_judge_id&feedback_status_id=$feedback_status_id&photo_path=$photo_path");
    } 
    //�ر����ݿ�
    mysqli_close($conn);

 ?>
