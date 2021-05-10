<!DOCTYPE html>
<?php

// $Id:$ //声明变量
$feedback_status_id = isset($_POST['feedback_status_id']) ? $_POST['feedback_status_id'] : "";

    //建立连接
    echo "连接成功";
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    
    //准备SQL语句,查询用户名
    $sql_select = "SELECT feedback_status_id FROM feedback_status_info WHERE feedback_status_id = '$feedback_status_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
     
    
        //用户名存在
        $sql_search = "select * from feedback_status_info where feedback_status_id = '$feedback_status_id'"; 
        $ret1 = mysqli_query($conn, $sql_search);
        $row1 = mysqli_fetch_array($ret1);
            ?>
              <!-- <table width="100%" border="1"> -->
              <table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
               <tr>
                 <th>反馈状态ID</th><th>反馈状态名</th>
               </tr>
               <tr>
                 <th><?php echo $row1['feedback_status_id'] ?></th><th><?php echo $row1['name'] ?></th>
               </tr>
             </table>
             <?php
        //header("Location:search.php?err=1");
    
    //关闭数据库    
    mysqli_close($conn);
?>
<tr> 
<td colspan="2" align="center"> 
回到<a href="search.php">查询界面</a>吧！ 
</td> 
</tr> 