<!DOCTYPE html>
<html>
<head>
<title>查询结果</title>
</head>
<body>
<div class="content" align="center"> 
<!--头部--> 
<div class="header" align="center"> <h1>查询结果页面</h1> </div> 
<!--中部--> 
<div class="middle"> 
<table border="1"> 
<tr>
<?php

// $Id:$ //声明变量
$username = isset($_POST['username']) ? $_POST['username'] : "";
    //建立连接
    // echo "连接成功";
    // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../initial_interface/db_config.php');
    $conn = db_connect();
    //准备SQL语句,查询用户名
    $sql_select = "SELECT username FROM user_info WHERE username = '$username' "; 
    //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    
    //判断用户名密码是否正确  
    if ($username == $row['username']) { 
        //用户名存在
        $sql_search = "select * from user_info where username = '$username'"; 
        $ret1 = mysqli_query($conn, $sql_search);
        $row1 = mysqli_fetch_array($ret1);
            ?>
              <!-- <table width="100%" border="1"> -->
              <table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
               <tr>
                 <th>用户ID</th><th>用户名</th><th>性别</th><th>部门</th><th>领导</th><th>角色</th><th>密码</th><th>电话1</th><th>电话2</th><th>QQ</th><th>邮箱</th><th>地址</th>
               </tr>
               <tr>
                 <th><?php echo $row1['user_id'] ?></th><th><?php echo $row1['username'] ?></th><th><?php echo $row1['sex'] ?></th><th><?php echo $row1['department_id'] ?></th>
                 <th><?php echo $row1['header_id'] ?></th><th><?php echo $row1['role_id'] ?></th><th><?php echo $row1['password'] ?></th><th><?php echo $row1['phone1'] ?></th>
                 <th><?php echo $row1['phone2'] ?></th><th><?php echo $row1['qq'] ?></th><th><?php echo $row1['email'] ?></th><th><?php echo $row1['address'] ?></th>
               </tr>
             </table>
             <?php
        //header("Location:search.php?err=1");
    } 
    else {//用户名密码不匹配
        //header("Location:search.php?err=3");
    } 
    //关闭数据库    
    mysqli_close($conn);
?>
</tr>
<p>
<tr> 
<td colspan="2" align="center"> 
<a href="search.php">回到查询界面</a> 
</td> 
</tr> 
<br />
 <tr> 
 <td colspan="2" align="center"> 
<a href="loginsucc.php">回到管理界面</a>
</td> 
</tr> 
<br />
 <tr> 
 <td colspan="2" align="center"> 
<a href="login.php">退出系统</a> 
</td> 
</tr> 
</table>
</div>
</div>
</body>
</html>