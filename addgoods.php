<?php
header("content-type:text/html; charset=utf-8");
$conn = new mysqli('localhost','root','root','shopshop');

$file = $_FILES['file'];
$name = $file['name'];

$goodsname = $_POST['goodsname'];
$price = $_POST['price'];
$goodscategory = $_POST['category'];

$x=1;
$type = strtolower(substr($name,strrpos($name,'.')+1));
$allow_type = array('jpg','png','gif','webp');
if(!in_array($type,$allow_type))
{
    echo '<script>alert("图片类型不合法！请重新选择。");window.location.href="show_addgoods.html"</script>';
    $x=0;
}
$upload_path = "picture/";

if($x)
{
    if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name']))
    {
        $sql = sprintf("insert into goods value(null,'%s','%s','%s','%s')",$goodsname,$name,$price,$goodscategory);
        $conn->query($sql);
        echo '<script>alert("添加成功");window.location.href="show_manager.html"</script>';
    }
    else
    {
        echo "添加失败";
    }
}
?>