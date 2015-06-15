$("#reviews_button").click(function (event) {
    event.preventDefault();
//    alert("123");
    $("#requests_container").hide(1000);
    $("#reviews_container").fadeIn(1000);
    $('#requests_button').removeClass('selected');
    $('#reviews_button').addClass('selected');
//    setTimeout('window.location.href = "./admin.php"', 1000)
});
$("#requests_button").click(function (event) {
    event.preventDefault();
//    alert("123");
    $("#reviews_container").hide(500);
    setTimeout('$("#requests_container").fadeIn(1000);', 500)
    $('#reviews_button').removeClass('selected');
    $('#requests_button').addClass('selected');
//    setTimeout('window.location.href = "./admin.php"', 1000)
});

