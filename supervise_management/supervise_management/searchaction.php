<!DOCTYPE html>
<?php

// $Id:$ //声明变量
$supervise_id = isset($_POST['supervise_id']) ? $_POST['supervise_id'] : "";

    //建立连接
    // echo "连接成功";
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT supervise_id FROM supervise WHERE supervise_id = '$supervise_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
     
    
        //用户名存在
        $sql_search = "select * from supervise where supervise_id = '$supervise_id'"; 
        $ret1 = mysqli_query($conn, $sql_search);
        $row1 = mysqli_fetch_array($ret1);
        $supervise_id=$row1['supervise_id'];
    	$assign_id=$row1['assign_id'];
        $begin_time=$row1['begin_time'];
        $end_time=$row1['end_time'];
        $supervise_judge_id=$row1['supervise_judge_id'];
        $feedback_status_id=$row1['feedback_status_id'];
        $photo_path=$row1['photo_path'];
            ?>
              <!-- <table width="100%" border="1"> -->
              <table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
               <tr>
                 <th>监督ID</th><th>任务ID</th><th>起始时间</th><th>结束时间</th><th>监督评价</th><th>反馈状态</th><th>照片路径</th>
               </tr>
               <?php
               echo "<tr><td>$supervise_id</td><td>$assign_id</td><td>$begin_time</td><td>$end_time</td><td>$supervise_judge_id</td><td>$feedback_status_id</td><td>$photo_path</td><tr>";
               ?>
               
                 <!-- <th><?php echo $row1['supervise_id'] ?></th><th><?php echo $row1['assign_id'] ?></th> -->
               
             </table>
             <?php
        //header("Location:search.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
?>
<tr> 
<td colspan="2" align="center"> 
<a href="../../用户管理/search.php">回到查询界面</a> 
</td> 
</tr> 
<br />
 <tr> 
 <td colspan="2" align="center"> 
<a href="../../用户管理/loginsucc.php">回到管理界面</a>
</td> 
</tr> 
<br />
 <tr> 
 <td colspan="2" align="center"> 
<a href="../../用户管理/login.php">退出系统</a> 
</td> 
</tr> 