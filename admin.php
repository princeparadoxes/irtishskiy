<?php

function __autoload($className) {
    $className = str_replace("..", "", $className);
    require_once( "classes/$className.php" );
}

$token = $_GET['token'];
echo '<link rel="stylesheet" type="text/css" href="../css/tables.css">';

if ($token != '87689385')
{
    echo '<script>window.location.href = "./access_denied.php";</script>';
}
$da = new DatabaseActions;
$deleteID = -1;
$obtainID = -1;

if (@$_REQUEST['delete']) {
    $id = $_REQUEST["delete"];
    echo $da->delete_request($id);
    header('Location: admin.php?token=87689385');
}
if (@$_REQUEST['obtain']) {
    $id = $_REQUEST["obtain"];
    echo $da->obtain_request($id);
    header('Location: admin.php?token=87689385');
}
?>

<html >
    <head>
        <meta charset="UTF-8">
        <title>Администативная панель</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body style="overflow: hidden;">
        <div class="wrapper" style="overflow-y: scroll;">
            <div style="text-align: right; margin-right: 10px; margin-top: 10px">
                <a href="./login.php" style="color: white" >Выйти</a>
            </div>
            <ul class="admin-menu">
                <li><a href="#" class="selected" id="requests_button">Заявки</a></li>
                <li><a href="#" id="reviews_button">Отзывы</a></li>
            </ul>
            <div id="requests_container">
                <?php
                Ecstatic::table($da->getAllFromRequest(), array('class' => "rwd-table", 'id' => "requests"))
                        ->show('id', "Номер заявки")
                        ->show('name', 'Имя')
                        ->show('phone', 'Телефон', array('0' => 'Не указан'))
                        ->show('type_number', 'Тип номера', array(-1 => 'Номер не выбран'))
                        ->show('email', 'Электронная почта')
                        ->show('obtain', "Статус", array(0 => 'Не принята', 1 => 'Принята'))
                        ->show('actionob', '', '<a href="admin.php?obtain=@[id]"><input type="button" '
                                . 'style="color: #53e3a6; background-color: white; border: 1px solid white; border-radius: 3px; padding: 5px" '
                                . 'value="Принять/Отменить"></a>')
                        ->show('actiondl', 'Удалить', '<a href="admin.php?delete=@[id]"><input type="button" '
                                . 'style="color: #53e3a6; background-color: white; border: 1px solid white; border-radius: 3px; padding: 5px" '
                                . 'value="Удалить"></a>')
                        ->out();
                ?>
            </div>
            <div id="reviews_container" style="display: none">
                <?php
                foreach ($da->getAllFromReview() as $value) {
                    $id = array_values($value)[0];
                    $name = array_values($value)[1];
                    $review = array_values($value)[2];
                    echo '<div class="expan"><input class="expan" type="checkbox" id="faq-'.$id.'"><h2 class="expan">'
                    . '<label class="expan" for="faq-'.$id.'">' . $name . '</label></h2><p class="expan">' . $review . '</p></div>';
                }
                ?>
            </div>
        </div>
    </body>
    <script src='js/login-misc.js'></script>
    <script src="js/admin.js"></script>
    <script src='js/toggle.js.js'></script>
</html>