<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webnews";
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式，用于抛出异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    switch($_GET["action"])
      {
        case "add": //执行添加操作
        //1.获取要添加的信息，并补充其他信息
        $newsTitle = $_POST["newsTitle"];
        $newsDesc = $_POST["newsDesc"];
        $newsContent = $_POST["newsContent"];
        // $newsDate = time();
        $sql = "INSERT INTO  news(newsTitle,newsDesc,newsContent)
        values('{$newsTitle}','{$newsDesc}','{$newsContent}')";
      }
    $conn->exec($sql);
    echo "新记录插入成功";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
 ?>
