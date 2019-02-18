<?php
header("content-type:text/html; charset=utf-8");
$conn = new mysqli('localhost','root','root','shopshop');

$username = $_COOKIE['username'];

$id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
$id.="aaa" ;
$sql = sprintf("update user set cart=concat(cart,'%s') where username='%s' ",$id,$username);

if (mysqli_query($conn,$sql))
{
    echo '<script>alert("添加成功");window.location.href="show_mycart.php"</script>';
}
else
{
    echo '<script>alert("添加失败");window.location.href="show_mycart.php"</script>';
}
?>