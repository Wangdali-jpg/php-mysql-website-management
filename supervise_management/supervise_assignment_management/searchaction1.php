<!DOCTYPE html>
<?php

// $Id:$ //声明变量
$assign_id = isset($_POST['assign_id']) ? $_POST['assign_id'] : "";

    //建立连接
    // echo "连接成功";
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT assign_id FROM assignment WHERE assign_id = '$assign_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    
        //用户名存在
        $sql_search = "select * from assignment where assign_id = '$assign_id'"; 
        $ret1 = mysqli_query($conn, $sql_search);
        $row1 = mysqli_fetch_array($ret1);
        $assign_id=$row1['assign_id'];
    	$name=$row1['name'];
        $level_id=$row1['level_id'];
        $parent_id=$row1['parent_id'];
        $assignor_id=$row1['assignor_id'];
        $supervisor_id=$row1['supervisor_id'];
        $assign_time=$row1['assign_time'];
        $begin_time=$row1['begin_time'];
        $end_time=$row1['end_time'];
        $equipment_id=$row1['equipment_id'];
        $status_id=$row1['status_id'];
            ?>
              <!-- <table width="100%" border="1"> -->
              <table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
               <tr>
                 <td>任务ID</td><td>任务名</td><td>等级ID</td><td>父ID</td><td>分配者ID</td><td>监管者ID</td><td>分配时间</td><td>起始时间</td><td>结束时间</td><td>设备ID</td><td>状态ID</td>
               </tr>
               
               <?php
               echo "<tr><td>$assign_id</td><td>$name</td><td>$level_id</td><td>$parent_id</td><td>$assignor_id</td><td>$supervisor_id</td><td>$assign_time</td><td>$begin_time</td><td>$end_time</td><td>$equipment_id</td><td>$status_id</td><tr>";
               ?>
                 <!-- <th><?php echo $row1['assign_id'] ?></th><th><?php echo $row1['name'] ?></th> -->
               
             </table>
             <?php
        //header("Location:search.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
?>
<tr> 
<td colspan="2" align="center"> 
<a href="search.php">回到查询界面</a> 
</td> 
</tr> 
<br />
<tr> 
<td colspan="2" align="center"> 
<a href="../../initial_interface/user_management.php">回到用户管理界面</a>
</td> 
</tr> 
<tr> 
<td colspan="2" align="center"> 
<a href="../../initial_interface/loginsucc.php">回到首页</a>
</td> 
</tr> 
<tr> 
<td colspan="2" align="center"> 
<a href="../../initial_interface/login.php">退出系统</a> 
</td> 
</tr> 