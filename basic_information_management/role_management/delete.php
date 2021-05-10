<!DOCTYPE html>
<?php
    //建立连接
    // $conn1 = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../../initial_interface/db_config.php');
    $conn1 = db_connect();
    
    //准备SQL语句,查询用部门名
    $sql_select1 = "SELECT name FROM role_info "; 
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
?>
<html>

<head>
<title>删除角色</title>
<meta name="content-type"; charset="UTF-8">
</head>

<body> 

<div class="content" align="center"> 
<!--头部--> 
<div class="header"> <h1>删除角色页面</h1> </div> 
<!--中部--> 
<div class="middle"> 
<form action="deleteaction.php" method="post"> 

<table border="0"> 

<tr>
<td>角色名</td>
<td>
    <select name = 'subject1[]' >
        <option>角色名</option>
        <?php
             foreach($arr1 as $word){ 
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
switch ($err) {
    case 1:
        echo "角色已经删除！";
        break;

    case 2:
        echo "密码与重复密码不一致！";
        break;

    case 3:
        echo "用户名或者密码错误！";
        break;
}
?>
 
</td> 
</tr>

<tr> 
<td colspan="2" align="center"> 
<input type="submit" id="delete" name="delete" value="删除">
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
