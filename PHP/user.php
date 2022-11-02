<?php 
   
    function checkUser($username, $password){
        $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
        $query =  "SELECT * FROM `taikhoan` WHERE tentaikhoan = '$username' and matkhau = '$password'";
        $result = mysqli_query($link, $query);
    }

    function login(){
        if((isset($_POST['login']))&&($_POST['login'])){
            $user = $_POST['username'];
            $password = $_POST['password'];
        }
    }
?>