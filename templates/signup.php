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
                <form method="post">
                    <h2>Sign Up</h2>
                    <div class="between_content_card">
                        <label for="Name">Name</label>
                        <input type="name" name="user_name" placeholder="What is your name?">
                    </div>
                    <div class="between_content_card">
                        <label for="email">Email</label>
                        <input type="email" name="user_email" placeholder="What is your email?">
                    </div>
                    <div class="between_content_card">
                        <label for="password">Password</label>
                        <input type="password" name="user_password" placeholder="What is your password?">
                    </div>
                    <div class="between_content_card">
                        <label for="re-password">Re-Password</label>
                        <input type="password" name="user_re-password" placeholder="What is your password?">
                    </div>
                    <input type="submit" value="Sign Up" class="submit">
                    <dev class="between_content_check">
                        <input type="checkbox" name="" id=""><span>Remenber Me.</span>
                    </dev>
                    <p>Do have a account?<a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
        <div class="right"></div>
    </header>
</body>
</html>