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
            <tr align="center">
                <h3>基本信息管理</3>
            </tr>
            <tr align="center">
                <th>
                    <table border="0">
                        <tr>
                            <h4>角色管理</h4>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/role_management/register.php">新增角色数据</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/role_management/update.php">修改角色数据</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/role_management/search.php">查询角色数据</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/role_management/delete.php">删除角色数据</a>
                        </tr>
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
                            <h4>公司名称管理</h4>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/company_management/register.php">新增公司名称</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/company_management/update.php">修改公司名称</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/company_management/search.php">查询公司名称</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/company_management/delete.php">删除公司名称</a>
                        </tr>
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
                            <h4>部门管理</h4>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/department_management/register.php">新增部门</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/department_management/update.php">修改部门</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/department_management/search.php">查询部门</a>
                        </tr>
                        <tr>
                            <br/> <a href="../basic_information_management/department_management/delete.php">删除部门</a>
                        </tr>
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
