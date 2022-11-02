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
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
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
                        if(isset($_POST['login']) && ($_POST['username'])){
                            echo $_get['username'];
                        }
                    ?>
                    <dev class="between_content_check">
                        <input type="checkbox" name="" id=""><span>Remenber Me.</span>
                    </dev>
                    <p>Don't have a account yet? <a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="right"></div>
    </header>
</body>
</html>