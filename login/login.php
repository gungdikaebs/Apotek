<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hello, Code!</title>
    <link rel="stylesheet" href="loginstyle.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="overlay"></div>
    <form action="proses_login.php" method="post" class="box">
        <div class="header">
            <br>
            <br>
            <br>
        </div>
        <div class="login-area">
            <input type="text" class="username" name="username" placeholder="Username" />
            <input type="password" class="password" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="simpan" class="submit" />
            <a href="#">Forgot Password?</a>
        </div>
    </form>
</body>

</html>