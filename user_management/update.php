<!DOCTYPE html>
<?php
    //建立连接
    // $conn1 = mysqli_connect("localhost", "root", "pwd_1234567", "zhongshiyouvs"); 
    require_once('../initial_interface/db_config.php');
    $conn1 = db_connect();
    
    //准备SQL语句,查询用部门ID
    $sql_select1 = "SELECT name FROM department_info "; 
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
    
    //准备SQL语句,查询用领导ID
    $sql_select2 = "SELECT username FROM user_info "; 
    //执行SQL语句
    $ret2 = mysqli_query($conn1, $sql_select2);
    // $row2 = mysqli_fetch_row($ret2); 
    $arr2 = array(); 
    // 输出每行数据  
    while($row2 = $ret2->fetch_assoc()) {  
        $arr2[] = $row2['username'];
    }
    //数组重复数据去重
    $arr2 = array_unique($arr2);
    //对数值进行排序
    sort($arr2);
    // $count2=count($row2);
    
    //准备SQL语句,查询用角色ID
    $sql_select3 = "SELECT name FROM role_info "; 
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

    //准备SQL语句,查询用角色ID
    $sql_select4 = "SELECT user_id FROM user_info "; 
    //执行SQL语句
    $ret4 = mysqli_query($conn1, $sql_select4);
    // $row3 = mysqli_fetch_row($ret3); 
    $arr4 = array(); 
    // 输出每行数据  
    while($row4 = $ret4->fetch_assoc()) {  
        $arr4[] = $row4['user_id'];
    }
    //数组重复数据去重
    $arr4 = array_unique($arr4);
    //对数值进行排序
    sort($arr4);
    // $count3=count($row3);
    
    //关闭数据库
    //mysqli_close($conn);
?>
<html>

<head>
<title>更新</title>
<meta name="content-type"; charset="UTF-8">
</head>

<body> 
<div class="content" align="center"> 

<!--头部--> 
<div class="header"> <h1>更新页面</h1> </div> 

<!--中部--> 
<div class="middle"> 
<form action="updateaction.php" method="post"> 
<table border="0"> 

<tr>
<td>用户ID：</td>
<td>
    <select name = 'subject4[]' required="required">
        <option>用户ID</option>
        <?php
             foreach($arr4 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
<td>(必填)</td>
</tr>

<tr> 
<td>用户名：</td> 
<td><input type="varchar" id="id_name" name="username" ></td> 
</tr> 
<tr>
 <td>性别：</td> 
 <td><input type="radio" id="sex" name="sex" value="男">男 <input type="radio" id="sex" name="sex" value="女">女 </td> 
 </tr>
<tr>
<td>部门名</td>
<td>
    <select name = 'subject1[]' >
        <option>部门名</option>
        <?php
             foreach($arr1 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>

<tr>
<td>领导名</td>
<td>
    <select name = 'subject2[]' >
        <option>领导名</option>
        <?php
             foreach($arr2 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>
<tr>
<td>角色名</td>
<td>
    <select name = 'subject3[]' >
        <option>角色名</option>
        <?php
             foreach($arr3 as $word){ 
                  echo'<option value="'.$word.'">'.$word.'</option>'; 
                } 
        ?>
    </select>
</td>
</tr>


<tr>
 <td>密   码：</td> 
 <!-- <td><input type="password" id="password" name="password" required="required"></td> -->
 <td><input type="varchar" id="password" name="password" ></td> 
</tr>  
<tr>
 <td>电话1：</td> 
 <td><input type="varchar" id="phone1" name="phone1" ></td> 
 </tr> 
 <tr>
 <td>电话2：</td> 
 <td><input type="varchar" id="phone2" name="pjone2" ></td> 
 </tr> 
 <tr>
 <td>QQ：</td> 
 <td><input type="varchar" id="qq" name="qq" ></td> 
 </tr> 
 <tr> 
<td>Email：</td> 
<td><input type="varchar" id="email" name="email" ></td> 
</tr> 
<tr> 
<td>地址：</td> 
<td><input type="varchar" id="address" name="address" ></td> 
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
        echo "用户ID不能为空！";
        break;

    case 3:
        echo "用户ID不存在！";
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
<a href="../initial_interface/user_management.php">回到用户管理界面</a>
</td> 
</tr> 
<tr> 
<td colspan="2" align="center"> 
<a href="../initial_interface/loginsucc.php">回到首页</a>
</td> 
</tr> 
<tr> 
<td colspan="2" align="center"> 
<a href="../initial_interface/login.php">退出系统</a> 
</td> 
</tr> 

</table> 
</form> 
</div> 

<!--脚部--> 
<div class="footer"> <small>Copyright &copy;版权所有；欢迎使用   版权所有 </div> 
</div>
</body>
</html>
