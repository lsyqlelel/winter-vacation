<?php
$conn = new mysqli('localhost','root','root','shopshop');
$id = isset($_REQUEST['id'])?$_REQUEST['id']:0;

$message['username0'] = $_COOKIE['username'];

$sql = sprintf("update user set cart='' where username='%s' ",$message['username0']);

if(mysqli_query($conn,$sql))
echo '<script>window.location.href="show_mycart.php"</script>';
?>