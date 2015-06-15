<!doctype html>
<?php

function __autoload($className) {
    $className = str_replace("..", "", $className);
    require_once( "classes/$className.php" );
}

$da = new DatabaseActions;
if (@$_REQUEST['button1']) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $type_number = $_POST["number"];
    if ($name == FALSE) {
        echo "<script>alert('Вы не указали имя');</script>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('E-mail ($email) указан не верно.');</script>";
        } else {
            if ($phone == FALSE) {
                echo "<script>alert('Вы не указали телефон');</script>";
            } else {
                echo "<script>alert('Ваша заявка обрабатывается');</script>";
                mail($email, "Санаторий Иртышский", "Уважаемы(-ая) $name спасибо Вам за оставление заявки. \nВаша заявка принята на рассмотрение.\n Ожидайте письма от администрации.");
                $da->addRequest($name, $phone, $email);
            }
        }
    }
}
if (@$_REQUEST['review_button']) {
    $aboutme = $_POST["about_me"];
    $review = $_POST["review"];
    if ($aboutme != FALSE && $review != FALSE) {
        $da->addReview($aboutme, $review);
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>СП Иртышский</title>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/jquery.arcticmodal.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/jquery.arcticmodal.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/download.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click', '.modal_header', function () {
                    $('#modal1').arcticmodal();
                });
                $(document).on('click', '.modal_i', function () {
                    $('#modal2').arcticmodal();
                });
                $(document).on('click', '.modalreviews', function () {
                    $('#modalreviews').arcticmodal();
                });
                $(document).on('click', '.test', function () {
                    //при клике на "пройти тест" обнуляем результат теста
                    $('.test_b2, .test_b3, .test_b4, .test_b5, .test_b6').hide();
                    $('.test_b1').show();
                    count = 0;//сбрасываем баллы
                    $('#modal3').arcticmodal();//вызываем окно с тестом

                });

            });
        </script>
        <meta name="viewport" content="width=1000">
    </head>
    <body>
        <div class="wraper">
            <header>
                <a href="" class="logo"><img src="img/logo.png"></a>
                <form class="h_form">
                    <span class="h_phone">+7 (903) 983-26-36  перезвоните нам</span>
                </form>
            </header>
            <div id="b1">
                <span class="b1_txt"><h1>Санаторий-Профилакторий "Иртышский"</h1></span><br />
                <span class="b1_txt1">Лучший санаторий в Чернолучинской зоне отдыха по версии ОмГПУ</span>
            </div>
            <div id="b2">
                <div class="b2_1">
                    <span class="b2_img"><img src="img/b2_2.png"></span>
                    <span class="b2_txt">Дизайн-проект</span>
                    <span class="b2_txt1">разработанный профессионалами</span>
                </div>
                <div class="b2_1">
                    <span class="b2_img"><img src="img/b2_3.png"></span>
                    <span class="b2_txt">Уютные номера</span>
                    <span class="b2_txt1">вежливое обслуживание<br />
                        доступные развлечения</span>
                </div>
                <div class="b2_1">
                    <span class="b2_img"><img src="img/b2_4.png"></span>
                    <span class="b2_txt">Круглосуточное
                    </span>
                    <span class="b2_txt1">обслуживание</span>
                </div>
            </div>
            <div id="b3">
                <span class="b3_txt">Уникальные и доступные развлечения для Вас и ваших детей</span>
                <span class="b3_txt1">без дополнительных наценок</span>
                <span class="b3_txt2">Мы с особой гордостью готовы представить вам<br />весь спектр доступных развлечений</span>
                <div class="b3_ul b3_ul1">
                    <span class="b3_txt4">На улице</span>
                    <div class="b3_li">
                        <ul>
                            <li>Кормление белок</li>
                            <li>Лыжные прогулки</li>
                            <li>Велосипедный тур по Чернолучью</li>
                            <li>Мангальные вечеринки</li>
                            <li>Купание в Иртыше</li>
                            <li>Снежки</li>
                            <li>Собирания ягод</li>
                        </ul>
                    </div>
                </div>
                <div class="b3_ul">
                    <span class="b3_txt4">В помещении</span>
                    <div class="b3_li">
                        <ul>
                            <li>Воллейбол</li>
                            <li>Футбол</li>
                            <li>Тренажёрный зал</li>
                            <li>Теннис</li>
                            <li>Столовая</li>
                            <li>Дискотека</li>
                            <li>Баня</li>
                            <li>Бильярд</li>
                        </ul>
                    </div>
                </div>
                <div class="b3_btn modal_header">Заказать дополнительные услуги</div>
            </div>
            <div id="b4">
                <span class="b4_txt">А вы знаете что санаторий готов </span>
                <span class="b4_txt1">предложить вам при заезде от 5 человек?</span>
                <span class="b4_txt2">При заказе билетов на 5 и более человек<br />Санаторий предоставит вам дополнительный приём пищи</span>
                <span class="b4_txt3">Абсолютно бесплатно!!!</span>
            </div>
            <div id="b5">
                <span class="b61_txt">Выберите номер для себя</span>
                <div class="b5_1">
                    <span class="b6_btn" id="all">Советский</span><span class="b6_btn" id="popular">Советский-люкс</span>
                </div>
                <div class="b5_container">
                    <a href="img/img_1.jpg" class="all"><img src="img/img_1.jpg"><span>Люкс-теремок</span></a>
                    <a href="img/img_2.jpg" class="all"><img src="img/img_2.jpg"><span>Счастье Пролетария</span></a>
                    <a href="img/img_3.jpg" class="all"><img src="img/img_3.jpg"><span>Кошкин дом</span></a>
                    <a href="img/img_5.jpg" class="popular"><img src="img/img_5.jpg"><span>Одиночное Блаженство</span></a>
                    <a href="img/img_4.jpg" class="popular"><img src="img/img_4.jpg"><span>Сладкоежка</span></a>
                    <a href="img/img_6.jpg" class="popular"><img src="img/img_6.jpg"><span>Царский отдых</span></a>
                </div>
                <a href="assets/numbers.docx" class="b5_catalog">Получить весь каталог номеров</a>
            </div>
            <div id="b6">
                <span class="b61_txt">Также вы сможете насладиться видами Чернолученской зоны отдыхя прямо из Окна</span>
                <div class="b6_1 b6_12">
                    <img src="img/b6_1.png">
                    <span class="b6_txt1">Лесной массив</span>
                </div>
                <div class="b6_1">
                    <img src="img/b6_2.png">
                    <span class="b6_txt1">Реликтовые деревья</span>
                </div>
                <div class="b6_1">
                    <img src="img/b6_3.png">
                    <span class="b6_txt1">Незабываемые восходы</span>
                </div>
                <div class="b6_1">
                    <img src="img/b6_4.png">
                    <span class="b6_txt1">Редкие животные</span>
                </div>
            </div>
            <div id="b8">
                <span class="b6_txt">Что будет после оформления путёвки?</span>
                <span class="b8_txt1 b8_text">В течение 30 минут</span>
                <span class="b8_txt2 b8_text">Сегодня-завтра</span>
                <span class="b8_txt3 b8_text">Сегодня-завтра</span>
                <span class="b8_txt4 b8_text">В день заезда</span>
                <span class="b8_txt5 b8_text">По окончании срока действия путёвки</span>
                <span class="b8_txt6 b8_text">Мы перезвоним вам<br />для уточнения данных</span>
                <span class="b8_txt7 b8_text">Все документы будут оформлены</span>
                <span class="b8_txt8 b8_text">Создание и согласование<br />вашей личной развлекательной программы</span>
                <span class="b8_txt9 b8_text">Вам не придётся ни о чём беспокоиться,<br />мы всё сделаем сами<br />Качество вашего отдыха для нас важнее всего</span>
                <span class="b8_txt10 b8_text">Вы не захотите нас покидать</span>
                <span class="b6_txt b8_txt11">Оставьте заявку, и ваш отдых будет незабываемым</span>
                <form class="form_1 form_3" method="post">
                    <input type="text" class="f_input name" placeholder="Имя" name="name">
                    <input type="text" class="f_input phone" placeholder="Телефон" name="phone">
                    <input type="text" class="f_input mail" placeholder="E-mail" name="email">
                    <input type="submit" value="Оставить заявку" class="f_submit" name="button1">
                </form>
                <span class="b8_txt12">Мы реализуем все ваши идеи в кратчайшие сроки</span>
            </div>
            <div id="b9">
                <span class="b6_txt">Отдыхая в Санатории-Профилактории "Иртышский", вы получите:</span>
                <div class="b9_1 b9_2">
                    <span class="b9_txt">1</span>
                    <span class="b9_txt1"><b>Бесплатное питание</b><br />для всех членов семьи</span>
                </div>
                <div class="b9_1">
                    <span class="b9_txt">2</span>
                    <span class="b9_txt1"><b>Большой выбор</b><br />развлечений</span>
                </div>
                <div class="b9_1">
                    <span class="b9_txt">3</span>
                    <span class="b9_txt1">Незабываемый отдых<br /><b>в реликтовых лесах Омска</b></span>
                </div>
                <div class="b9_1">
                    <span class="b9_txt">4</span>
                    <span class="b9_txt1"><b>Непередаваемы колорит</b> <br />Сибирской деревни</span>
                </div>
                <div class="b9_1 b9_3">
                    <span class="b9_txt">5</span>
                    <span class="b9_txt1">Огромный выбор<br /><b>досуговых мероприятий</b></span>
                </div>
                <div class="b9_1">
                    <span class="b9_txt">6</span>
                    <span class="b9_txt1">Незабываемые ощущения<br /><b>заботу и любовь</b></span>
                </div>
                <div class="b9_1">
                    <span class="b9_txt">7</span>
                    <span class="b9_txt1"><b>Непередаваемый опыт</b><br />доступного отдыха</span>
                </div>
            </div>
            <div id="b10">
                <span class="b6_txt">Отзывы наших клиентов</span>
                <div class="b10_1">
                    <img src="img/b10_3.png">
                    <div class="b10_txt">
                        <span class="b10_txt1">Отдыхала в Санатории в прошлом году</span>
                        <span class="b10_txt2">Невероятные ощущения не покидают меня до сих пор. Такого отдыха у меня не было уже очень длавно. Даже по сравнению с Анапой отдых был просто великолепен. Обязательно приеду ещё.</span>
                        <span class="b10_txt3">Гульнара Мухаметшина, 29 лет</span>
                    </div>
                </div>
                <div class="b10_1">
                    <img src="img/b10_2.png">
                    <div class="b10_txt">
                        <span class="b10_txt1">Всей семьёй отмечали Новый Год в "Иртышском"</span>
                        <span class="b10_txt2">Конкурсная программа поразила нас всех. Даже парализованная бабушка лихо отплясывала и участвовала в конкурсах. Просто невероятное место с потрясающей энергетикой. Теперь ездим сюда минимум раз в год.</span>
                        <span class="b10_txt3">Ирина Иванова, 26 лет</span>
                    </div>
                </div>
                <div class="b10_1">
                    <img src="img/b10_1.png">
                    <div class="b10_txt">
                        <span class="b10_txt1">Просто невероятно колоритное место</span>
                        <span class="b10_txt2">Никогда бы не подумала, что можно так отдохнуть за такие смешные деньги. Отдых на уровне, даже добавить нечего. Теперь всем рекомендую отдыхать именно в "Иртышском"</span>
                        <span class="b10_txt3">Станислава Станиславова, 40 лет</span>
                    </div>
                </div>
                <div class="review_btn modalreviews">Оставить отзыв</div>
            </div>
            <footer>
                <span class="footer_txt">СП "Иртышский"</span>
                <span class="footer_txt2">2015 (с) Все права защищены</span>
                <span class="footer_txt3">ИНН 7705549297<br />ОРГНИП 1137746806416</span>
            </footer>
        </div>
        <!-- modalheader-->
        <div style="display: none;">
            <div class="box-modal modal_inner" id="modal2">
                <div class="modal-close arcticmodal-close">x</div>
                <div class="modal-content-box">
                    <img src="img/img_1.jpg" id="modal_img">
                    <form class="form_1 form_9" method="post">
                        <span class="f9_txt">Хотите отдохнуть роскошно?</span>
                        <span class="f9_txt1">Оставьте заявку и узнайте персональную<br />цену с учетом размеров комнаты<br />и ваших пожеланий.</span>
                        <input type="text" class="f_input name" placeholder="Имя" name="name">
                        <input type="text" class="f_input phone" placeholder="Телефон" name="phone">
                        <input type="text" class="f_input mail" placeholder="E-mail" name="email">
                        <input type="submit" value="Оставить заявку" class="f_submit" name="button1">

                    </form>
                    </form>
                </div>
            </div>
        </div>

        <div style="display: none;">
            <div class="box-modal" id="modal1">
                <div class="modal-close arcticmodal-close">x</div>
                <div class="modal-content-box">
                    <form class="form_1 form_6">
                        <span class="f9_txt" style="margin: 20px 0 20px 0;">Мы перезвоним или напишем</span>
                        <input type="text" class="f_input name" placeholder="Имя">
                        <input type="text" class="f_input phone" placeholder="Телефон">
                        <input type="text" class="f_input mail" placeholder="E-mail">
                        <input type="submit" value="Оставить заявку" class="f_submit">
                    </form>
                </div>
            </div>
        </div>

        <div style="display: none;">
            <div class="box-modal" id="modalreviews">
                <div class="modal-close arcticmodal-close">x</div>
                <div class="modal-content-box">
                    <form class="form_1 form_6" method="post">
                        <span class="f9_txt" style="margin: 20px 0 20px 0;">Оставьте отзыв.</span>
                        <input type="text" class="f_input review_about_me" name="about_me" placeholder="О себе">
                        <textarea type="text" rows="12" class="text-a" name="review" placeholder="Текст отзыва"></textarea>
                        <input type="submit" value="Отправить отзыв" name="review_button" class="f_submit">
                    </form>
                </div>
            </div>
        </div>

        <div style="display: none;">
            <div class="box-modal" id="modal3">
                <div class="modal-close arcticmodal-close">x</div>
                <div class="modal-content-box">
                    <span class="f9_txt" style="margin: 20px 0 20px 0; text-align: center">Подходит ли вам отдых в Санатории-профилактории "Иртышский"?</span>
                    <div class="test_block">
                        <div class="test_b1">
                            <span class="test_q">Любите ли вы лыжные прогулки?</span>
                            <div class="test_a">
                                <span class="a a1">Да</span>
                                <span class="a a2">Нет</span>
                                <span class="a a3">Не уверен</span>
                            </div>
                        </div>
                        <div class="test_b2">
                            <span class="test_q">Нравится ли вам активный отдых?</span>
                            <div class="test_a">
                                <span class="a a1">Да</span>
                                <span class="a a2">Нет</span>
                                <span class="a a3">Не уверен</span>
                            </div>
                        </div>
                        <div class="test_b3">
                            <span class="test_q">Любите ли вы находиться в окружении первозданной природы?</span>
                            <div class="test_a">
                                <span class="a a1">Да</span>
                                <span class="a a2">Нет</span>
                                <span class="a a3">Не уверен</span>
                            </div>
                        </div>
                        <div class="test_b4">
                            <span class="test_q">Нравится ли вам колорит современной глубинки?</span>
                            <div class="test_a">
                                <span class="a a1">Да</span>
                                <span class="a a2">Нет</span>
                                <span class="a a3">Не уверен</span>
                            </div>
                        </div>
                        <div class="test_b5">
                            <span class="test_q">Вы готовы к новым знакомствам?</span>
                            <div class="test_a">
                                <span class="a a1">Да</span>
                                <span class="a a2">Нет</span>
                                <span class="a a3">Не уверен</span>
                            </div>
                        </div>
                        <div class="test_b6">
                            <span class="test_q test_qend"> </span>
                            <span class="f_submit arcticmodal-close">закончить тест</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="test">
            п<br /><br />р<br /><br />о<br /><br />й<br /><br />т<br /><br />и<br /><br /><br />т<br /><br />е<br /><br />с<br /><br />т
        </div>
    </body>
</html>
