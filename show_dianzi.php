<?php
$id = $_COOKIE['id'];
$username = $_COOKIE['username'];
$conn = new mysqli('localhost','root','root','shopshop');

$cpage = isset($_REQUEST['p'])?$_REQUEST['p']:1;
if($cpage<1)
{
    $cpage=1;
}
$records = mysqli_num_rows(mysqli_query($conn," select * from goods where category = 'A' "));
$ptotal = floor($records/4);
if($records%4>0)
{
    $ptotal++;
}
if($cpage>=$ptotal)
{
    $cpage = $ptotal;
}

$sql = sprintf("select * from goods where category = 'A' limit %d,4",($cpage-1)*4);
$result = mysqli_query($conn,$sql);
$message = array();
while(($row = @mysqli_fetch_array($result)) != false)
{
    $message[] = $row;
}
?>



<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<center>
<font size="5" color="purple">电子</font></br>
<table border="1" width=600 bgcolor="#7fffd4">
    <?php
    foreach($message as $row){
    $picture1 = $row['picture'];
    $picture2 = "picture/";
    $picture3 = $picture2 . $picture1;
    ?>
        <tr>
        <td><img src="<?=$picture3?>" width="200" alt="<?=$row['name']?>" /></td>
        <td>商品编号：<?=$row['id']?></td>
        <td>商品名：<?=$row['goodsname']?></td>
        <td>价格：<?=$row['price']?></td>
        <td><a href="javascript:if(confirm('加入购物车?')){location('addcart.php?id=<?=$row['id']?>')}">加入购物车</a></td>
        <?php
        }
        ?>
</table>

<table border="1" width=450 bgcolor="#fff0f5">
    <tr>
        <td>总共<?=$records?>条商品信息 共<?=$ptotal?>页 当前第<?=$cpage?>页
            <a href="show_dianzi.php?p=1">首页</a>
            <a href="show_dianzi.php?p=<?=($cpage-1)?>">上一页</a>
            <a href="show_dianzi.php?p=<?=($cpage+1)?>">下一页</a>
            <a href="show_dianzi.php?p=<?=$ptotal?>">尾页</a>
        </td>
    </tr>
</table>

<?php
$managerflag = $_COOKIE['manager'];
if($managerflag)
{
    $next = "show_manager.html";
}
else
{
    $next = "show_putong.html";
}
?>
<a href="<?=$next?>">返回</a></br>
</center>
</body>
</html>