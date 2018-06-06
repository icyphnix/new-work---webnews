<?php

    session_start();

    $dbname = 'localhost';
    $database = 'webnews';
    $dbuser = 'root';
    $pwd = '';

    try {
        $con = new PDO('mysql:host='.$dbname.';dbname='.$database,$dbuser,$pwd);
        $con->exec('SET NAMES UTF8');
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e) {
        echo "Connection faild :" . $e->getMessage();
    }

    if(isset($_POST['userName'])&&isset($_POST['userPassword'])){
        $userName = $_POST['userName'];
        $passWord = $_POST['userPassword'];

        $res =$con->prepare("SELECT * FROM user WHERE userName = '$userName'");
        $res->execute();
        $row = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $value)

        if($value['userPassword'] == $passWord){
            $_SESSION['userName'] = $userName;
            $_SESSION['userPassword'] = $passWord;

            header('Location: loginsuccesses.php');
        }
        else {
            echo "<h3>密码不正确</h3>";
        }
    }
    else {
        echo "<h3>请输入用户名和密码</h3>";
    }
?>
