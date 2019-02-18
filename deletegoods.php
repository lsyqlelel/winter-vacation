<?php
    $conn = new mysqli('localhost','root','root','shopshop');

    $id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
    $sql = "delete from goods where id=".$id;
    if(mysqli_query($conn,$sql))
    echo '<script>window.location.href="show_manager.html"</script>';
?>