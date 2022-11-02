<?php 
    function checkUser($username, $password, $link){
        $query =  "SELECT * FROM `taikhoan` WHERE tentaikhoan = '$username' and matkhau = '$password'";
        $result = mysqli_query($link, $query);
        if(!mysqli_num_rows($result)){
            return 0;
        }else
        {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    
?>