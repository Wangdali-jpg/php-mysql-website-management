<!DOCTYPE html>
<html>
<head>
<title>新增公司名称</title>
<meta name="content-type"; charset="UTF-8">
</head>
<body> 
<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>新增公司名称页面</h1> </div> 
<!--中部--> 
<div class="middle"> 
<form action="registeraction.php" method="post"> 
<table border="0"> 

<tr> 
<td>公司ID：</td> 
<td><input type="varchar" id="company_id" name="company_id" required="required"></td> 
</tr>
<tr> 
<td>公司名：</td> 
<td><input type="varchar" id="name" name="name" required="required"></td> 
</tr> 

<tr> 
<td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息--> 
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
switch ($err) {
    case 1:
        echo "角色ID已存在！";
        break;

    case 2:
        echo "密码与重复密码不一致！";
        break;

    case 3:
        echo "新增成功！";
        break;
}
?> 
</td> 
</tr> 

<tr> 
<td colspan="2" align="center"> 
<input type="submit" id="register" name="register" value="新增">
 <input type="reset" id="reset" name="reset" value="重置"> 
 </td>
 </tr> 


<tr> 
<td colspan="2" align="center"> 
<a href="../../initial_interface/basic_information_management.php">回到监管管理管理界面</a>
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


</table> 
</form> 
</div> 

<!--脚部--> 
<div class="footer"> <small>Copyright &copy;版权所有；欢迎使用      </div> 
</div>
</body>
</html>
