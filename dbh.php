<?php
    $dbms='mysql';     //数据库类型
    $host='localhost'; //数据库主机名
    $dbName='webnews';    //使用的数据库
    $user='root';      //数据库连接用户名
    $pass='';          //对应的密码
    try {
    $dbh = new PDO('mysql:host=localhost;dbname=webnews', $user, $pass);
    foreach($dbh->query('SELECT * from user') as $row) {
        // print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
 ?>
