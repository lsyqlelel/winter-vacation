<?php
    header("content-type:text/html; charset=utf-8");
    $x = 1;
    $conn = new mysqli('localhost','root','root','shopshop');
    $message['username'] = $_REQUEST['username'];
    $message['password1'] = $_REQUEST['password'];
    $sql0 = sprintf("select count(*) from user where username = '".$message['username']."'");
    $result0 = mysqli_query($conn,$sql0);
    $num = mysqli_fetch_array($result0,MYSQLI_NUM);
    if($num[0]==0)
    {
        echo '<script>alert("该账号不存在");window.location.href="show_login.html"</script>';
        $x = 0;
    }

    if($x)
    {
        $y = 1;
        $sql1 = sprintf("select password from user where username = '".$message['username']."'");
        $result1 = mysqli_query($conn,$sql1);
        $s = md5($message['password1']);
        $pass = mysqli_fetch_array($result1,MYSQLI_NUM);
        $z=0;
        if($pass[0]!=$s)
        {
            echo '<script>alert("密码错误");window.location.href="show_login.html"</script>';
            $y = 0;
        }
        if($y)
        {
            $sql2= sprintf("select id from user where username = '".$message['username']."'");
            $result2 = mysqli_query($conn,$sql2);
            $id = mysqli_fetch_array($result2,MYSQLI_NUM);
            setcookie('id',$id[0]);
            setcookie('username',$message['username']);
            $sql3= sprintf("select manager from user where username = '".$message['username']."'");
            $result3= mysqli_query($conn,$sql3);
            $select = mysqli_fetch_array($result3,MYSQLI_NUM);
            if($select[0]==0)
            {
                echo '<script>alert("登录成功");window.location.href="show_putong.html"</script>';
                setcookie('manager',$select[0]);
            }
            else
            {
                echo '<script>alert("登录成功");window.location.href="show_manager.html"</script>';
                setcookie('manager',$select[0]);
            }
        }
    }
?>