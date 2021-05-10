<!DOCTYPE html>
<html>

<head>
<title>查询用户</title>
<meta name="content-type"; charset="UTF-8">
</head>

<body> 
<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>查询用户页面</h1></div> 
<!--中部--> 
<div class="middle"> 
<form action="search.php" method="post"> 
<table border="0"> 
<tr> 
<td>用户ID：</td> 
<td><input type="varchar" id="user_id" name="user_id" required="required"></td> 
</tr> 
<tr> 
<td colspan="2" align="center"> 
<input type="submit" id="search" name="search" value="查询">
<input type="reset" id="reset" name="reset" value="重置"> 
</td>
</tr> 
</table> 
<br />
<?php
// $Id:$ //声明变量
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
require_once('../initial_interface/db_config.php');
$conn = db_connect();
$sql_search = "select * from user_info where user_id = '$user_id'"; 
$ret1 = mysqli_query($conn, $sql_search);
$row1 = mysqli_fetch_array($ret1);
if(!empty($user_id)){
    $user_id=$row1['user_id'];
    $username=$row1['username'];
}
?>
<table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
<tr>
    <td>用户ID</td><td>用户名</td>
</tr>
<?php
if(!empty($user_id)){
    echo "<tr><td>$user_id</td><td>$username</td><tr>";
}
else{
    echo "<tr><td>&nbsp</td><td></td><tr>";
}
?>
</table>
 <?php
//header("Location:search.php?err=1");
//关闭数据库    
mysqli_close($conn);
?>
<br />
<table style='text-align:left;border:solid' border="1">	
<tr><td>用户ID</td><td>用户名</td></tr>
<?php

require_once('../initial_interface/db_config.php');
$conn = db_connect();
if($conn){
    // echo '连接成功';
}
else{
    echo '连接失败';
}
    $sql = "SELECT * FROM `user_info`";
    $retval=mysqli_query($conn,$sql);
     //$row=mysqli_fetch_assoc($retval);
     //print_r($row);
     //$row=mysqli_fetch_assoc($retval);
     //print_r($row);//这个只能一行一行的输出
    $num=mysqli_num_rows($retval);
    //这里用一个for循环输出所有满足条件的查询语句
    for($i=0; $i <$num ; $i++) { 
    	$row=mysqli_fetch_assoc($retval);
        $user_id=$row['user_id'];
        $username=$row['username'];
    	echo "<tr><td>$user_id</td><td>$username</td><tr>";
    }
    //快速获取数据的条数,不用通过查询所有条数
    //$result=mysqli_query($conn,'select count(*)from course');
    //$num1=mysqli_fetch_array($result);
    //echo '数据条数'.$num1[0];
    mysqli_close($conn);
?>
 </table>
<tr> 
<td colspan="2" align="center"> 
<a href="../initial_interface/user_management.php">回到用户管理界面</a>
</td> 
</tr> 
<br />
<tr> 
<td colspan="2" align="center"> 
<a href="../../initial_interface/loginsucc.php">回到首页</a>
</td> 
</tr> 
<br />
<tr> 
<td colspan="2" align="center"> 
<a href="../../initial_interface/login.php">退出系统</a> 
</td> 
</tr> 

</form> 
</div> 

<!--脚部--> 
<div class="footer"> <small>Copyright &copy;版权所有；欢迎使用   版权所有 </div> 

</div>
</body>
</html>
