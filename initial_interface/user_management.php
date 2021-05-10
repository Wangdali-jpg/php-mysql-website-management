<!DOCTYPE html>
<html>

<head>
<title>系统管理界面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

</style>
</head>

<body> 





<?php
// $Id:$ //开启session
session_start(); //声明变量
$username = isset($_SESSION['user']) ? $_SESSION['user'] : ""; //判断session是否为空
if (!empty($username)) { ?> 
<div class="content" align="center">
<h1>作业管理系统</h1> 


<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="2">
    <a href="loginsucc.php">回到首页</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="login.php">退出系统</a>
    </th>
  </tr>
  <tr>
    <th>
        <table border="0">
            <tr>
                <h3>用户管理</h3>
            </tr>
                <br/> <a href="../user_management/register.php">新增用户数据</a>
                <br/> <a href="../user_management/update.php">修改用户数据</a>
                <br/> <a href="../user_management/search.php">查询用户数据</a>
                <br/> <a href="../user_management/delete.php">删除用户数据</a>
        </table>
    </th>

  </tr>
  
  
  
</table>
</table>
<?php
} 
else { //未登录，无权访问
     ?>
     
 <h1>你无权访问！！！</h1> 
 
<?php
} ?> 



<!--脚部--> 
<div class="footer" align="center"> <small>Copyright &copy; 版权所有；欢迎使用 </div> 

</body>

</html>
