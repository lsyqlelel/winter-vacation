<?php
header("content-type:text/html; charset=utf-8");
$conn = new mysqli('localhost','root','root','shopshop');
$message['username0'] = $_REQUEST['username'];
$message['password1'] = $_REQUEST['password1'];
$message['password2'] = $_REQUEST['password2'];
$x = 1;
if($message['username0']==null)
{
    echo '<script>alert("账号不能为空");window.location.href="show_register.html"</script>';
    $x = 0;
}
if($message['password1']!=$message['password2'])
{
    echo '<script>alert("两次输入密码不一致，请重新输入");window.location.href="show_register.html"</script>';
    $x = 0;
}
if($message['password1']==null)
{
    echo '<script>alert("密码不能为空");window.location.href="show_register.html"</script>';
    $x = 0;
}
if($x)
{
    $sql = sprintf("update user set manager=concat(manager,'1') where username='%s' ",$message['username0']);
    mysqli_query($conn,$sql);

    echo '<script>alert("添加管理员成功");window.location.href="show_manager.html"</script>';
}
?>