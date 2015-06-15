<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Вход</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/loader.css">
    </head>
    <body >
        <div class="wrapper">
            <div class="container">
                <h1 id="header">Вход</h1>
                <form class="form" name="login-form">
                    <input type="text" id="loginlogin" placeholder="Логин">
                    <input type="password" id="loginpassword" placeholder="Пароль">
                    <button type="submit" id="login-button">Войти</button>
                </form>
            </div>
            <div id="loader-wrapper" style="display: none">
                <div id="loader"></div>
            </div>
            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <script src='js/login-misc.js'></script>
        <script src="js/login.js"></script>
    </body>
</html>
