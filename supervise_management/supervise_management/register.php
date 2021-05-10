<!DOCTYPE html>
<?php
    //建立连接
    // $conn1 = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn1 = db_connect();
    
    //准备SQL语句,查询任务名
    $sql_select1 = "SELECT assign_id FROM assignment "; 
    //执行SQL语句
    $ret1 = mysqli_query($conn1, $sql_select1);
    // $row1 = mysqli_fetch_row($ret1); 
    $arr1 = array(); 
    // 输出每行数据  
    while($row1 = $ret1->fetch_assoc()) {  
        $arr1[] = $row1['assign_id'];
    }
    //数组重复数据去重
    $arr1 = array_unique($arr1);
    //对数值进行排序
    sort($arr1);
    // $count1=count($row1);
    
    //准备SQL语句,查询监督状态
    $sql_select2 = "SELECT name FROM supervise_judge_info"; 
    //执行SQL语句
    $ret2 = mysqli_query($conn1, $sql_select2);
    // $row2 = mysqli_fetch_row($ret2); 
    $arr2 = array(); 
    // 输出每行数据  
    while($row2 = $ret2->fetch_assoc()) {  
        $arr2[] = $row2['name'];
    }
    //数组重复数据去重
    $arr2 = array_unique($arr2);
    //对数值进行排序
    sort($arr2);
    // $count2=count($row2);
    
    //准备SQL语句,查询反馈状态
    $sql_select3 = "SELECT name FROM feedback_status_info "; 
    //执行SQL语句
    $ret3 = mysqli_query($conn1, $sql_select3);
    // $row3 = mysqli_fetch_row($ret3); 
    $arr3 = array(); 
    // 输出每行数据  
    while($row3 = $ret3->fetch_assoc()) {  
        $arr3[] = $row3['name'];
    }
    //数组重复数据去重
    $arr3 = array_unique($arr3);
    //对数值进行排序
    sort($arr3);
    // $count3=count($row3);



    
    //关闭数据库
    //mysqli_close($conn);
?>
<html>
<head>
<title>新增监督</title>
<meta name="content-type"; charset="UTF-8">
</head>
<body> 
<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>新增监督页面</h1> </div> 
<!--中部--> 
<div class="middle"> 
<form action="registeraction.php" method="post"> 
<table border="0"> 

<tr> 
<td>监督ID：</td> 
<td><input type="varchar" id="supervise_id" name="supervise_id" required="required"></td> 
</tr>
<tr>
<td>任务ID</td>
<td>
    <select name = 'subject1[]' >
        <option>任务ID</option>
        <?php
             foreach($arr1 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
<tr> 
<td>开始时间：</td> 
<td><input type="date" id="begin_time" name="begin_time" required="required"></td> 
</tr>
<tr> 
<td>结束时间：</td> 
<td><input type="date" id="end_time" name="end_time" required="required"></td> 
</tr>
<tr>
<td>监督评价</td>
<td>
    <select name = 'subject2[]' >
        <option>等级名</option>
        <?php
             foreach($arr2 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
<tr>
<td>反馈状态</td>
<td>
    <select name = 'subject3[]' >
        <option>等级名</option>
        <?php
             foreach($arr3 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
<tr> 
<td>照片路径：</td> 
<td><input type="varchar" id="photo_path" name="photo_path" required="required"></td> 
</tr>

<tr> 
<td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息--> 
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
// $assign_id = isset($_GET["assign_id"]) ? $_GET["assign_id"] : "";
// $supervise_id = isset($_GET["supervise_id"]) ? $_GET["supervise_id"] : "";
// $begin_time = isset($_GET["begin_time"]) ? $_GET["begin_time"] : "";
// $end_time = isset($_GET["end_time"]) ? $_GET["end_time"] : "";
// $supervise_judge_id = isset($_GET["supervise_judge_id"]) ? $_GET["supervise_judge_id"] : "";
// $feedback_status_id = isset($_GET["feedback_status_id"]) ? $_GET["feedback_status_id"] : "";
// $photo_path = isset($_GET["photo_path"]) ? $_GET["photo_path"] : "";
// echo '<br />';
// echo $supervise_id;
// echo '<br />';
// echo $assign_id;
// echo '<br />';
// echo $begin_time;
// echo '<br />';
// echo $end_time;
// echo('&nbsp;'); 
// echo '<br />';
// echo $supervise_judge_id;
// echo '<br />';
// echo $feedback_status_id;
// echo '<br />';
// echo $photo_path;
// echo '<br />';
// echo $err;
echo '<br />';
switch ($err) {
    case 1:
        echo "该监督ID已存在！";
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
<a href="../../initial_interface/supervise_management.php">回到监管管理管理界面</a>
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
<div class="footer"> <small>Copyright &copy;版权所有；欢迎使用     </div> 
</div>
</body>
</html>
