<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webnews";
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式，用于抛出异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "INSERT INTO user (userName,userPassword)
    VALUES ($username,$password)";
    // 使用 exec() ，没有结果返回
    $conn->exec($sql);
    echo "新记录插入成功";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
 ?>
