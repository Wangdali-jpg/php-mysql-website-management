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
    
        <table border="0">
            <tr>
                <h3>监管管理</h3>
            </tr>
            <tr>
                <th>
                    <table border="0">
                        <tr>
                            <h4>监管状态管理</h4>
                        </tr>
                            <br/> <a href="../supervise_management/supervise_status_management/register.php">新增监管状态</a>
                            <br/> <a href="../supervise_management/supervise_status_management/update.php">修改监管状态</a>
                            <br/> <a href="../supervise_management/supervise_status_management/search.php">查询监管状态</a>
                            <br/> <a href="../supervise_management/supervise_status_management/delete.php">删除监管状态</a>
                    </table>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                    <table border="0">
                        <tr>
                            <h4>监管分配管理</h4>
                        </tr>
                        <br/> <a href="../supervise_management/supervise_assignment_management/register.php">新增监管分配</a>
                        <br/> <a href="../supervise_management/supervise_assignment_management/update.php">修改监管分配</a>
                        <br/> <a href="../supervise_management/supervise_assignment_management/search.php">查询监管分配</a>
                        <br/> <a href="../supervise_management/supervise_assignment_management/delete.php">删除监管分配</a>
                    </table>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                    <table border="0">
                        <tr>
                            <h4>监管评价管理</h4>
                        </tr>
                        <br/> <a href="../supervise_management/supervise_judge_management/register.php">新增评价</a>
                        <br/> <a href="../supervise_management/supervise_judge_management/update.php">修改评价</a>
                        <br/> <a href="../supervise_management/supervise_judge_management/search.php">查询评价</a>
                        <br/> <a href="../supervise_management/supervise_judge_management/delete.php">删除评价</a>
                    </table>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                    <table border="0">
                        <tr>
                            <h4>监督管理</h4>
                        </tr>
                        <br/> <a href="../supervise_management/supervise_management/register.php">新增监督</a>
                        <br/> <a href="../supervise_management/supervise_management/update.php">修改监督</a>
                        <br/> <a href="../supervise_management/supervise_management/search.php">查询监督</a>
                        <br/> <a href="../supervise_management/supervise_management/delete.php">删除监督</a>
                    </table>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                    <table border="0">
                        <tr>
                            <h4>反馈状态管理</h4>
                        </tr>
                        <br/> <a href="../supervise_management/feedback_status_management/register.php">新增反馈状态</a>
                        <br/> <a href="../supervise_management/feedback_status_management/update.php">修改反馈状态</a>
                        <br/> <a href="../supervise_management/feedback_status_management/search.php">查询反馈状态</a>
                        <br/> <a href="../supervise_management/feedback_status_management/delete.php">删除反馈状态</a>
                    </table>
                </th>
            </tr>
        </table>
    
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
