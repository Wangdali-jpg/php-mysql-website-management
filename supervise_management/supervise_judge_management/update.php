<!DOCTYPE html>
<?php
    //建立连接
    // $conn1 = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn1 = db_connect();
    
    //准备SQL语句,查询监管状态ID
    $sql_select1 = "SELECT supervise_judge_id FROM supervise_judge_info "; 
    //执行SQL语句
    $ret1 = mysqli_query($conn1, $sql_select1);
    // $row1 = mysqli_fetch_row($ret1); 
    $arr1 = array(); 
    // 输出每行数据  
    while($row1 = $ret1->fetch_assoc()) {  
        $arr1[] = $row1['supervise_judge_id'];
    }
    //数组重复数据去重
    $arr1 = array_unique($arr1);
    //对数值进行排序
    sort($arr1);
    // $count1=count($row1);
    //关闭数据库
    mysqli_close($conn1);
?>
<html>

<head>
<title>更新监管评价</title>
<meta name="content-type"; charset="UTF-8">
</head>

<body> 
<div class="content" align="center"> 

<!--头部--> 
<div class="header"> <h1>更新监管评价页面</h1> </div> 

<!--中部--> 
<div class="middle"> 
<form action="updateaction.php" method="post"> 
<table border="0"> 
<tr>
<td>监管评价ID：</td>
<td>
    <select name = 'subject1[]' >
        <option>监管评价ID：</option>
        <?php
             foreach($arr1 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
<tr> 
<td>监管评价名：</td> 
<td><input type="varchar" id="name" name="name" ></td> 
</tr> 

<tr> 
<td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息--> 
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
switch ($err) {
    case 1:
        echo "更新完成！";
        break;

    case 2:
        echo "角色ID不能为空！";
        break;

    case 3:
        echo "角色ID不存在！";
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
<a href="../../initial_interface/supervise_management.php">回到监管管理界面</a>
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
