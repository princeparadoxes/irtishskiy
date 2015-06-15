$("#reviews_button").click(function (event) {
    event.preventDefault();
    $("#requests_container").hide(1000);
    $("#reviews_container").fadeIn(1000);
    $('#requests_button').removeClass('selected');
    $('#reviews_button').addClass('selected');
});
$("#requests_button").click(function (event) {
    event.preventDefault();
    $("#reviews_container").hide(500);
    setTimeout('$("#requests_container").fadeIn(1000);', 500)
    $('#reviews_button').removeClass('selected');
    $('#requests_button').addClass('selected');
});
$(".table_btn").click(function (event) {
    document.getElementById('loader-wrapper').style.display = "block";
});

