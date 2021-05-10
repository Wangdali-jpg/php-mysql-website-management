<!DOCTYPE html>
<html>

<head>
<title>查询任务</title>
<meta name="content-type"; charset="UTF-8">
</head>

<body> 

<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>查询任务页面</h1> 
</div> 

<!--中部--> 
<div class="middle"> 
<form action="searchaction.php" method="post"> 

<table border="0"> 
<tr> 
<td>状态ID：</td> 
<td><input type="varchar" id="assign_id" name="assign_id" required="required"></td> 
</tr> 
 


<tr> 
<td colspan="2" align="center"> 
<input type="submit" id="search" name="search" value="查询">
<input type="reset" id="reset" name="reset" value="重置"> 
</td>
</tr> 
</table> 

<br />

<table style='text-align:left;border:solid' border="1">	
		<tr><td>任务ID</td><td>任务名</td><td>等级ID</td><td>父ID</td><td>分配者ID</td><td>监管者ID</td><td>分配时间</td><td>起始时间</td><td>结束时间</td><td>设备ID</td><td>状态ID</td></tr>
 <?php
     // $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
     require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
	 if($conn){
			echo '连接成功';
     }else{
     	echo '连接失败';
     }
    $sql = "SELECT * FROM `assignment`";
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
        $assign_id=$row['assign_id'];
    	$name=$row['name'];
        $level_id=$row['level_id'];
        $parent_id=$row['parent_id'];
        $assignor_id=$row['assignor_id'];
        $supervisor_id=$row['supervisor_id'];
        $assign_time=$row['assign_time'];
        $begin_time=$row['begin_time'];
        $end_time=$row['end_time'];
        $equipment_id=$row['equipment_id'];
        $status_id=$row['status_id'];
  
    	echo "<tr><td>$assign_id</td><td>$name</td><td>$level_id</td><td>$parent_id</td><td>$assignor_id</td><td>$supervisor_id</td><td>$assign_time</td><td>$begin_time</td><td>$end_time</td><td>$equipment_id</td><td>$status_id</td><tr>";
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
<a href="../../initial_interface/user_management.php">回到用户管理界面</a>
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
</form> 
</div> 

<!--脚部--> 
<div class="footer"> <small>Copyright &copy;版权所有；欢迎使用     </div> 

</div>
</body>
</html>
