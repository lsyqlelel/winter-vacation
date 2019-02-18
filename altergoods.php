<?php
header("content-type:text/html; charset=utf-8");
$conn = new mysqli('localhost','root','root','shopshop');
$alterid = $_REQUEST['id'];
$altername = $_REQUEST['goodsname'];
$alterprice = $_REQUEST['price'];
$altercategory = $_REQUEST['category'];

$sql = sprintf("update goods set goodsname = '%s' ,price = '%s' , category= '%s' where id = '%s' ",$altername,$alterprice,$altercategory,$alterid);

if (mysqli_query($conn,$sql))
{
    echo '<script>alert("修改成功");window.location.href="show_manager.html"</script>';
}
else
{
    echo '<script>alert("修改失败");window.location.href="show_manager.html"</script>';
}
?>