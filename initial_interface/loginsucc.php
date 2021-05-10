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
    <th colspan="3">欢迎您！<?php
    echo $username; ?> 
    &nbsp;&nbsp;&nbsp;&nbsp;

    <a href="login.php">退出系统</a>
    </th>
  </tr>
  <tr>
    <th>
        <table border="0">
            <tr>
                <h2>首页</h2>
            </tr>
                <br/> <a href="user_management.php">用户管理</a>
                <br/>
                <br/> <a href="basic_information_management.php">基本信息管理</a>
                <br/>
                <br/> <a href="supervise_basic_information_management.php">监管基本信息管理</a>
                <br/>
                <br/> <a href="supervise_management.php">监管管理</a>
        </table>
    </th>
  </tr>
  
  
</table>

</div>
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
