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

    function checkUserExist($username, $link){
        $query =  "SELECT * FROM `taikhoan` WHERE tentaikhoan = '$username'";
        $result = mysqli_query($link, $query);
        if(!mysqli_num_rows($result)){
            return 0;
        }else
        {
            return 1;
        }
    }

    function isAdmin($username, $link){
        $query =  "SELECT * FROM `taikhoan` WHERE tentaikhoan = '$username' AND  IsAdmin = 1";
        $result = mysqli_query($link, $query);
        if(!mysqli_num_rows($result)){
            return 0;
        }else
        {
            return 1;
        }
    }

    function user_signup($username, $name, $password, $link){
            $query = "insert into taikhoan(TenTaiKhoan, TenNguoiDung, MatKhau) values ('${username}', '${name}', '${password}') ";
            $result = mysqli_query($link, $query);
            if($result){
                return 1;
            }
            else
            {
                return 0;
            }
    }
    

    
?>