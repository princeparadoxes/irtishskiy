$("#login-button").click(function (event) {
    event.preventDefault();
    if (document.getElementById('loginlogin').value.toString().localeCompare("admin") == 0 &&
            document.getElementById('loginpassword').value.toString().localeCompare("admin") == 0) {
        document.getElementById('header').style.color = "#ffffff";
        document.getElementById('header').innerHTML = "Добро пожаловать";
        $('form').fadeOut(500);
        $('.wrapper').addClass('form-success');
        setTimeout('window.location.href = "./admin.php?token=87689385"', 1000)
        
    }
    else {
        document.getElementById('header').innerHTML = 'Неверный логин/пароль';
        document.getElementById('header').style.color = "#ff0000";
    }
});