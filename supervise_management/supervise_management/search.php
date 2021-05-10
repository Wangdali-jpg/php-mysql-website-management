<!DOCTYPE html>
<html>

<head>
<title>查询监督</title>
<meta name="content-type"; charset="UTF-8">
</head>

<body> 

<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>查询监督页面</h1> 
</div> 

<!--中部--> 
<div class="middle"> 
<form action="search.php" method="post"> 

<table border="1"> 
<tr> 
<td>监督ID：</td> 
<td><input type="varchar" id="supervise_id" name="supervise_id" required="required"></td> 
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
$supervise_id = isset($_POST['supervise_id']) ? $_POST['supervise_id'] : "";
//建立连接
// echo "连接成功";
// $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
require_once('../../initial_interface/db_config.php');
    $conn = db_connect();
//准备SQL语句,查询用户名
$sql_select = "SELECT supervise_id FROM supervise WHERE supervise_id = '$supervise_id' "; 
//执行SQL语句
$ret = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($ret); 
//用户名存在
$sql_search = "select * from supervise where supervise_id = '$supervise_id'"; 
$ret1 = mysqli_query($conn, $sql_search);
$row1 = mysqli_fetch_array($ret1);
if(!empty($supervise_id)){
    $supervise_id=$row1['supervise_id'];
    $assign_id=$row1['assign_id'];
    $begin_time=$row1['begin_time'];
    $end_time=$row1['end_time'];
    $supervise_judge_id=$row1['supervise_judge_id'];
    $feedback_status_id=$row1['feedback_status_id'];
    $photo_path=$row1['photo_path'];
}
?>
<!-- <table width="100%" border="1"> -->
<table style="word-break: break-all;  word-wrap:break-word;"width="960px" border="1" align="center" >
<tr>
 <td>监督ID</td><td>任务ID</td><td>开始时间</td><td>结束时间</td><td>监督评价</td><td>反馈状态</td><td>照片路径</td>
</tr>

<?php
if(!empty($supervise_id)){
    echo "<tr><td>$supervise_id</td><td>$assign_id</td><td>$begin_time</td><td>$end_time</td><td>$supervise_judge_id</td><td>$feedback_status_id</td><td>$photo_path</td><tr>";
}
else{
    echo "<tr><td>&nbsp</td><td></td><td></td><td></td><td></td><td></td><tr>";
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
		<tr><td>监督ID</td><td>任务ID</td><td>起始时间</td><td>结束时间</td><td>监督评价</td><td>反馈状态</td><td>照片路径</td></tr>
 <?php
     $conn = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
	 if($conn){
			// echo '连接成功';
     }else{
     	echo '连接失败';
     }
    $sql = "SELECT * FROM `supervise`";
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
        $supervise_id=$row['supervise_id'];
        $assign_id=$row['assign_id'];
    	$begin_time=$row['begin_time'];
        $end_time=$row['end_time'];
        $supervise_judge_id=$row['supervise_judge_id'];
        $feedback_status_id=$row['feedback_status_id'];
        $photo_path=$row['photo_path'];
        
  
    	echo "<tr><td>$supervise_id</td><td>$assign_id</td><td>$begin_time</td><td>$end_time</td><td>$supervise_judge_id</td><td>$feedback_status_id</td><td>$photo_path</td><tr>";
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
<a href="../../initial_interface/supervise_management.php">回到监管管理管理界面</a>
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
