<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!--    Main Stylesheet-->
    <link rel="stylesheet" href="SCSS/stylesheet.css">
    <!--    Partials: login and forms-->
    <link rel="stylesheet" href="SCSS/partials/login.css">
    <link rel="stylesheet" href="SCSS/partials/testing.css">
</head>

<body>
    <div class="login-container">
        <section class="login" id="login">
            <header>
                <h2><img src="images/logo-ideagen-corp.svg" alt=""></h2>
                <h4>Login to access your documents</h4>
            </header>
            <form class="login-form" action="php/loginUser.php" method="post">
                <label>
                <input type="text" name="username" id="username" autofocus>
                <div class="label-text">Username</div>
            </label>

                <label>
                <input type="password" name="password_hash" id="password_hash">
                <div class="label-text">Password</div>
            </label>
                <div class="submit-container">
                    <div class="sub-container">
                        <button class="btn medium secondary">Forgot Password?</button>
                    </div>
                    <div class="sub-container">
                        <input type="submit" class="btn medium primary" value="Log In">
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>

</html>
