<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');

    $sql = "Delete from chude where ID = '$id'";
    $link->query($sql);
}
header("location: /BTL/PHP/ChuDe/index.php")
?>