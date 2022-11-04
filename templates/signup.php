<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Music App Register</title>
</head>
<body>
    <header>
        <div class="left"></div>
        <div class="between">
            <div class="between_content">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                    <h2>Sign Up</h2>
                    <div class="between_content_card">
                        <label for="Name">Username</label>
                        <input type="name" name="username" placeholder="What's your username?">
                    </div>
                    <div class="between_content_card">
                        <label for="name">Name</label>
                        <input type="name" name="name" placeholder="What's your name?">
                    </div>
                    <div class="between_content_card">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="What is your password?">
                    </div>
                    <div class="between_content_card">
                        <label for="re-password">Re-Password</label>
                        <input type="password" name="re-password" placeholder="What is your password?">
                    </div>
                    <input type="submit" name="signup" method="post" value="Sign Up" class="submit">
                    <?php 
                        require_once '../PHP/user.php';
                        $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
                        session_start();
                        if(isset($_POST['signup']) && isset($_POST['username'])&& isset($_POST['name']) && isset($_POST['password']) && isset($_POST['re-password'])){
                            $username =  trim($_POST['username']);
                            $password =  trim($_POST['password']);
                            $repassword = trim($_POST['re-password']);
                            $name = trim($_POST['name']);
                            $specificChar = '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/';
                            if($username == '' || $password == ''){
                                echo 'Thông tin không thể để trống';
                            }
                            elseif(preg_match('/\s/',$username) || preg_match('/\s/',$password)){
                                echo 'Thông tin không thể chứa khoảng trống';
                            }
                            elseif(preg_match($specificChar, $username) && preg_match($specificChar, $password) && preg_match($specificChar, $name)){
                                echo 'Trường chứa ký tự không hợp lệ';
                            }    
                            elseif($password != $repassword){
                                echo 'Mật khẩu nhập lại không khớp';
                            }
                            elseif(checkUserExist($username, $link)){
                                echo "Tài khoản đã tồn tại";
                            }
                            else  {
                                    $acc = user_signup($username,$name, $password, $link);
                                    if($acc){  
                                        echo 'Bạn đã đăng ký thành công!';
                                        $_SESSION['username'] = $username;
                                        header("Location: http://localhost/BTL/");
                                    }
                                    else{
                                        echo "Đã xảy ra lỗi ";
                                    }
                            }
                        }
                        else{
                            echo '';
                        }
                        
                    ?>
                    <p>Do have a account?<a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
        <div class="right"></div>
    </header>
</body>
</html>