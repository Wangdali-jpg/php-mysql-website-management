<!DOCTYPE html>
<?php

// $Id:$ //声明变量
$company_id = isset($_POST['company_id']) ? $_POST['company_id'] : "";
    //建立连接
    echo "连接成功";
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT company_id FROM company_info WHERE company_id = '$company_id' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
     
    
        //用户名存在
        $sql_search = "select * from company_info where company_id = '$company_id'"; 
        $ret1 = mysqli_query($conn, $sql_search);
        $row1 = mysqli_fetch_array($ret1);
            ?>
              <!-- <table width="100%" border="1"> -->
              <table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
               <tr>
                 <th>公司ID</th><th>公司名</th>
               </tr>
               <tr>
                 <th><?php echo $row1['company_id'] ?></th><th><?php echo $row1['name'] ?></th>
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