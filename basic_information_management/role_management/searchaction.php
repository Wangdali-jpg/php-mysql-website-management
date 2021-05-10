<!DOCTYPE html>
<?php

// $Id:$ //声明变量
$role_id = isset($_POST['role_id']) ? $_POST['role_id'] : "";
    //建立连接
    // echo "连接成功";
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();//准备SQL语句,查询用户名
    $sql_select = "SELECT role_id FROM role_info WHERE role_id = '$role_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
     
    
        //用户名存在
        $sql_search = "select * from role_info where role_id = '$role_id'"; 
        $ret1 = mysqli_query($conn, $sql_search);
        $row1 = mysqli_fetch_array($ret1);
            ?>
              <!-- <table width="100%" border="1"> -->
              <table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
               <tr>
                 <th>角色ID</th><th>角色名</th>
               </tr>
               <tr>
                 <th><?php echo $row1['role_id'] ?></th><th><?php echo $row1['name'] ?></th>
               </tr>
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
<a href="../../用户管理/loginsucc.php">回到管理界面</a>
</td> 
</tr> 
<br />
 <tr> 
 <td colspan="2" align="center"> 
<a href="../../用户管理/login.php">退出系统</a> 
</td> 
</tr> 