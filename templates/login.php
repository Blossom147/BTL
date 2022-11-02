<?php     $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Music App Login</title>
</head>
<body>
    <header>
        <div class="left"></div>
        <div class="between">
            <div class="between_content">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <h2>Login</h2>
                    <div class="between_content_card">
                        <label for="Name">Name</label>
                        <input type="name" name="username" placeholder="What is your username?">
                    </div>
                    <div class="between_content_card">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="What is your password?">
                    </div>
                    <input type="submit" name="login" value="Login" class="submit">
                
                    <?php 
                        require_once '../PHP/user.php';
                        session_start();
                        if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
                            $username =  trim($_POST['username']);
                            $password =  trim($_POST['password']);
                            $specificChar = '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/';
                            if($username == '' || $password == ''){
                                echo 'Thông tin không thể để trống';
                            }
                            elseif(preg_match('/\s/',$username) || preg_match('/\s/',$password)){
                                echo 'Thông tin không thể chứa khoảng trống';
                            }
                            elseif(preg_match($specificChar, $username)){
                                echo 'Trường chứa ký tự không hợp lệ';
                            }    
                            else  {
                                $acc = checkUser($username, $password, $link);
                                if($acc){  
                                    echo 'Bạn đã đăng nhập thành công!';
                                    $_SESSION['username'] = $username;
                                    header("Location: http://localhost/BTL/");
                                }
                                else{
                                    echo 'Tài khoản hoặc mật khẩu không chính xác!';
                                }
                            }
                        }
                        else{
                            echo '';
                        }
                        
                    ?>
                
                    <dev class="between_content_check">
                        <input type="checkbox" name="remember" id=""><span>Remenber Me.</span>
                    </dev>
                    <p>Don't have a account yet? <a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="right"></div>
    </header>
</body>
</html>