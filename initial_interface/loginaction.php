<?php
header("Content-Type: text/html; charset=utf-8");
require_once('db_config.php');
// $Id:$ //��������
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? $_POST['remember'] : ""; 
//�ж��û����������Ƿ�Ϊ��

if (!empty($user_id) && !empty($password)) { 
//��������

    // $conn = mysqli_connect('localhost', 'root', 'pwd_1234567', 'zhongshiyouvs'); 
    require_once('db_config.php');
    $conn = db_connect();
    //׼��SQL���
    $sql_select = "SELECT user_id,password FROM user_info WHERE user_id = '$user_id' AND password = '$password'"; 
    //ִ��SQL���
    $ret = mysqli_query($conn,$sql_select);
    $row = mysqli_fetch_array($ret); //�ж��û����������Ƿ���ȷ
    
    if ($user_id == $row['user_id'] && $password == $row['password']) 
    { //ѡ�С���ס�ҡ�
        if ($remember == "on") 
        { //����cookie
            setcookie("user_id", $user_id, time() + 7 * 24 * 3600);
        } //����session
        session_start(); //����session
        $_SESSION['user'] = $user_id; //д����־
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:m:s');
        $info = sprintf("��ǰ�����û���%s,IP��ַ��%s,ʱ�䣺%s /n", $user_id, $ip, $date);
        $sql_logs = "INSERT INTO logs(user_id,ip,date) VALUES('$user_id','$ip','$date')";
        //��־д���ļ�����ʵ�ִ˹��ܣ���Ҫ�����ļ�Ŀ¼logs
        //$f = fopen('./logs/' . date('Ymd') . '.log', 'a+');
        //fwrite($f, $info);
        //fclose($f); 
        //��ת��loginsucc.phpҳ��
        header("Location:loginsucc.php"); //�ر����ݿ�,��ת��loginsucc.php
        mysqli_close($conn);
    }
    else 
    { 
        //�û�ID��������󣬸�ֵerrΪ1
        header("Location:login.php?err=1");
    }
} else { //�û�ID������Ϊ�գ���ֵerrΪ2
    header("Location:login.php?err=2");
} ?>
