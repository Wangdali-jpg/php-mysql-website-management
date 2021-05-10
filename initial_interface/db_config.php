<?php

define("HOST","localhost");  
define("USER","root");  
define("PASS","pwd_1234567");
define("DBNAME","zuoyemanagement");

// 连接数据库函数
function db_connect() {
    $result = mysqli_connect(HOST, USER, PASS, DBNAME);
    if (!$result) {
        throw new Exception('不能连接到数据库！');
    } else {
        return $result;
    }
}

?>