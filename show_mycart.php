<html>
<body>
<div style="text-align:center;">
<font size="5" color="purple">我的购物车</font></br>
</div>
</body>
</html>

<?php
$username = $_COOKIE['username'];
$conn = new mysqli('localhost','root','root','shopshop');

$sql = sprintf("select * from user where username = '%s' ",$username);
$result = mysqli_query($conn,$sql);
$message = array();
while(($row = @mysqli_fetch_array($result)) != false)
{
    $message[] = $row;
}

foreach($message as $row)
{
    $sarr = @explode('aaa',$row['cart']);
    foreach($sarr as $str)
    {
        $sql2 = sprintf("select * from goods where id = '%s' ",$str);
        $result2 = mysqli_query($conn,$sql2);
        $message2 = array();
        while(($row2 = @mysqli_fetch_array($result2)) != false)
        {
            $message2[] = $row2;
        }
        foreach($message2 as $row2)
            ?>

                    <html>
                        <body>
                    <center>
                            <table border="1" width=600 bgcolor="#fff0f5">
                                <tr>
                                    <td>商品名：<?=$row2['goodsname']?></td>
                                    <td>价格：<?=$row2['price']?></td>
                                </tr>
                            </table>
                    </center>
                        </body>
                    </html>
            <?php
    }
}
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div style="text-align:center;">
        <td><a href="javascript:if(confirm('清空所有商品?')){location('deletefromcart.php')}">清空购物车</a></td>
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
        </div>
</body>
</html>