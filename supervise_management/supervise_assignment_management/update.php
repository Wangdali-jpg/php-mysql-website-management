<!DOCTYPE html>
<?php
    //建立连接
    // $conn1 = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn1 = db_connect();
    
    //准备SQL语句,查询任务名
    $sql_select1 = "SELECT name FROM zuoyexiangmuhezuoyexuke "; 
    //执行SQL语句
    $ret1 = mysqli_query($conn1, $sql_select1);
    // $row1 = mysqli_fetch_row($ret1); 
    $arr1 = array(); 
    // 输出每行数据  
    while($row1 = $ret1->fetch_assoc()) {  
        $arr1[] = $row1['name'];
    }
    //数组重复数据去重
    $arr1 = array_unique($arr1);
    //对数值进行排序
    sort($arr1);
    // $count1=count($row1);
    
    //准备SQL语句,查询等级名
    $sql_select2 = "SELECT name FROM level_info "; 
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
    
    //准备SQL语句,查询分配者名
    $sql_select3 = "SELECT username FROM user_info "; 
    //执行SQL语句
    $ret3 = mysqli_query($conn1, $sql_select3);
    // $row3 = mysqli_fetch_row($ret3); 
    $arr3 = array(); 
    // 输出每行数据  
    while($row3 = $ret3->fetch_assoc()) {  
        $arr3[] = $row3['username'];
    }
    //数组重复数据去重
    $arr3 = array_unique($arr3);
    //对数值进行排序
    sort($arr3);
    // $count3=count($row3);

    //准备SQL语句,查询监管者名
    $sql_select4 = "SELECT username FROM user_info "; 
    //执行SQL语句
    $ret4 = mysqli_query($conn1, $sql_select4);
    // $row3 = mysqli_fetch_row($ret3); 
    $arr4 = array(); 
    // 输出每行数据  
    while($row4 = $ret4->fetch_assoc()) {  
        $arr4[] = $row4['username'];
    }
    //数组重复数据去重
    $arr4 = array_unique($arr4);
    //对数值进行排序
    sort($arr4);
    // $count3=count($row3);
    
    //准备SQL语句,查询设备名
    $sql_select5 = "SELECT name FROM equipment_info "; 
    //执行SQL语句
    $ret5 = mysqli_query($conn1, $sql_select5);
    // $row3 = mysqli_fetch_row($ret3); 
    $arr5 = array(); 
    // 输出每行数据  
    while($row5 = $ret5->fetch_assoc()) {  
        $arr5[] = $row5['name'];
    }
    //数组重复数据去重
    $arr5 = array_unique($arr5);
    //对数值进行排序
    sort($arr5);
    // $count3=count($row3);
    
    //准备SQL语句,查询状态名
    $sql_select6 = "SELECT name FROM status_info "; 
    //执行SQL语句
    $ret6 = mysqli_query($conn1, $sql_select6);
    // $row3 = mysqli_fetch_row($ret3); 
    $arr6 = array(); 
    // 输出每行数据  
    while($row6 = $ret6->fetch_assoc()) {  
        $arr6[] = $row6['name'];
    }
    //数组重复数据去重
    $arr6 = array_unique($arr6);
    //对数值进行排序
    sort($arr6);
    // $count3=count($row3);
    
    //准备SQL语句,查询任务ID
    $sql_select7 = "SELECT assign_id FROM assignment "; 
    //执行SQL语句
    $ret7 = mysqli_query($conn1, $sql_select7);
    // $row3 = mysqli_fetch_row($ret3); 
    $arr7 = array(); 
    // 输出每行数据  
    while($row7 = $ret7->fetch_assoc()) {  
        $arr7[] = $row7['assign_id'];
    }
    //数组重复数据去重
    $arr7 = array_unique($arr7);
    //对数值进行排序
    sort($arr7);
    // $count3=count($row3);
    
    //关闭数据库
    //mysqli_close($conn);
?>
<html>
<head>
<title>修改监管分配</title>
<meta name="content-type"; charset="UTF-8">
</head>
<body> 
<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>修改监管分配页面</h1> </div> 
<!--中部--> 
<div class="middle"> 
<form action="updateaction.php" method="post"> 
<table border="0"> 

<tr>
<td>任务ID：</td>
<td>
    <select name = 'subject7[]' >
        <option>任务ID</option>
        <?php
             foreach($arr7 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
<td>(必填)</td>
</tr>
<tr> 
<td>任务名：</td> 
<td><input type="varchar" id="name" name="name" ></td> 
</tr>
<!--
<tr>
<td>任务名</td>
<td>
    <select name = 'subject1[]' >
        <option>任务名</option>
        <?php
             foreach($arr1 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
-->
<tr>
<td>等级名</td>
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
<td>父ID：</td> 
<td><input type="varchar" id="parent_id" name="parent_id" ></td> 
</tr>
<tr>
<td>分配者</td>
<td>
    <select name = 'subject3[]' >
        <option>分配者</option>
        <?php
             foreach($arr3 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
<tr>
<td>监管者</td>
<td>
    <select name = 'subject4[]' >
        <option>监管者</option>
        <?php
             foreach($arr4 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
<tr> 
<td>分配时间：</td> 
<td><input type="date" id="assign_time" name="assign_time" ></td> 
</tr>
<tr> 
<td>开始时间：</td> 
<td><input type="date" id="begin_time" name="begin_time" ></td> 
</tr>
<tr> 
<td>结束时间：</td> 
<td><input type="date" id="end_time" name="end_time" ></td> 
</tr>
<tr>
<td>设备名</td>
<td>
    <select name = 'subject5[]' >
        <option>设备名</option>
        <?php
             foreach($arr5 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
<tr>
<td>状态名</td>
<td>
    <select name = 'subject6[]' >
        <option>状态名</option>
        <?php
             foreach($arr6 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>

<tr> 
<td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息--> 
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
// $assign_id = isset($_GET["assign_id"]) ? $_GET["assign_id"] : "";
// $assignment_name = isset($_GET["assignment_name"]) ? $_GET["assignment_name"] : "";
// $level_id = isset($_GET["level_id"]) ? $_GET["level_id"] : "";
// $parent_id = isset($_GET["parent_id"]) ? $_GET["parent_id"] : "";
// $assignor_id = isset($_GET["assignor_id"]) ? $_GET["assignor_id"] : "";
// $supervisor_id = isset($_GET["supervisor_id"]) ? $_GET["supervisor_id"] : "";
// $assign_time = isset($_GET["assign_time"]) ? $_GET["assign_time"] : "";
// $begin_time = isset($_GET["begin_time"]) ? $_GET["begin_time"] : "";
// $end_time = isset($_GET["end_time"]) ? $_GET["end_time"] : "";
// $equipment_id = isset($_GET["equipment_id"]) ? $_GET["equipment_id"] : "";
// $status_id = isset($_GET["status_id"]) ? $_GET["status_id"] : "";
// echo '<br />';
// echo $assign_id;
// echo '<br />';
// echo $assignment_name;
// echo '<br />';
// echo $level_id;
// echo '<br />';
// echo $parent_id;
// echo '<br />';
// echo $assignor_id;
// echo '<br />';
// echo $supervisor_id;
// echo '<br />';
// echo $assign_time;
// echo '<br />';
// echo $begin_time;
// echo '<br />';
// echo $end_time;
// echo('&nbsp;'); 
// echo '<br />';
// echo $equipment_id;
// echo '<br />';
// echo $status_id;
// echo '<br />';
// echo $err;
echo '<br />';
switch ($err) {
    case 1:
        echo "任务ID不存在！";
        break;

    case 2:
        echo "任务ID不能为空！";
        break;

    case 3:
        echo "修改成功！";
        break;
}
?> 
</td> 
</tr> 

<tr> 
<td colspan="2" align="center"> 
<input type="submit" id="update" name="update" value="更新">
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
