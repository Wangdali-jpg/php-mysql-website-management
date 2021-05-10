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
                <h3>监管基本信息管理</h3>
            </tr>
            <tr>
                <th>
                    <table border="0">
                        <tr>
                            <h4>设备类别管理</h4>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_category_management/register.php">新增设备类别</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_category_management/update.php">修改设备类别</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_category_management/search.php">查询设备类别</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_category_management/delete.php">删除设备类别</a>
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
                            <h4>设备名称管理</h4>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_management/register.php">新增设备名称</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_management/update.php">修改设备名称</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_management/search.php">查询设备名称</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/equipment_management/delete.php">删除设备名称</a>
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
                            <h4>位置管理</h4>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/location_management/register.php">新增位置</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/location_management/update.php">修改位置</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/location_management/search.php">查询位置</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/location_management/delete.php">删除位置</a>
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
                            <h4>监管级别管理</h4>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/supervise_level_management/register.php">新增监管级别</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/supervise_level_management/update.php">修改监管级别</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/supervise_level_management/search.php">查询监管级别</a>
                        </tr>
                        <tr>
                            <br/> <a href="../supervise_basic_information_management/supervise_level_management/delete.php">删除监管级别</a>
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
