<!DOCTYPE html>
<html>

<head>
<title>查询设备类别</title>
<meta name="content-type"; charset="UTF-8">
</head>

<body> 

<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>查询设备类别页面</h1> 
</div> 

<!--中部--> 
<div class="middle"> 
<form action="search.php" method="post"> 

<table border="0"> 
<tr> 
<td>设备类别ID：</td> 
<td><input type="varchar" id="equipmentcategory_id" name="equipmentcategory_id" required="required"></td> 
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
$equipmentcategory_id = isset($_POST['equipmentcategory_id']) ? $_POST['equipmentcategory_id'] : "";
//建立连接
// echo "连接成功";
// $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
//准备SQL语句,查询用户名
// $sql_select = "SELECT * FROM department_info WHERE department_id = '$department_id' "; 
//执行SQL语句
// $ret = mysqli_query($conn, $sql_select);
// $row = mysqli_fetch_array($ret); 
//用户名存在
$sql_search = "select * from equipmentcategory_info where equipmentcategory_id = '$equipmentcategory_id'"; 
$ret1 = mysqli_query($conn, $sql_search);
$row1 = mysqli_fetch_array($ret1);
if(!empty($equipmentcategory_id)){
    $equipmentcategory_id=$row1['equipmentcategory_id'];
    $name=$row1['name'];
}
?>
<!-- <table width="100%" border="1"> -->
<table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
<tr>
 <td>设备类别ID</td><td>设备类别名</td>
</tr>

<?php
if(!empty($equipmentcategory_id)){
    echo "<tr><td>$equipmentcategory_id</td><td>$name</td><tr>";
}
else{
    echo "<tr><td>&nbsp</td><td></td><tr>";
}
?>
 <!-- <th><?php echo $row1['assign_id'] ?></th><th><?php echo $row1['name'] ?></th> -->

</table>
 <?php
//header("Location:search.php?err=1");
//关闭数据库    
mysqli_close($conn);
?>
<br />
<table style='text-align:left;border:solid' border="1">	
		<tr><td>设备类别ID</td><td>设备类别名</td></tr>
 <?php
     // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
     require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
	 if($conn){
			// echo '连接成功';
     }else{
     	echo '连接失败';
     }
    $sql = "SELECT * FROM `equipmentcategory_info`";
    $retval=mysqli_query($conn,$sql);
        
    //echo '<h3>在WEB页面显示以下内容:用户信息</h3>';
 
     //$row=mysqli_fetch_assoc($retval);
     //print_r($row);
     //$row=mysqli_fetch_assoc($retval);
     //print_r($row);//这个只能一行一行的输出
 
    $num=mysqli_num_rows($retval);
    //这里用一个for循环输出所有满足条件的查询语句
    for ($i=0; $i <$num ; $i++) { 
    	$row=mysqli_fetch_assoc($retval);
        $equipmentcategory_id=$row['equipmentcategory_id'];
    	$name=$row['name'];
  
    	echo "<tr><td>$equipmentcategory_id</td><td>$name</td><tr>";
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
<a href="../../initial_interface/supervise_basic_information_management.php">回到监管基本信息管理界面</a>
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
<div class="footer"> <small>Copyright &copy;版权所有；欢迎使用     </div> 

</div>
</body>
</html>
