<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/Services/img/favicon.ico" type="image/x-icon">
    <meta name="robots" content="noindex,nofollow">
    <title>Мастер на час в Минске | Профиль</title>
    <link rel="stylesheet" href="/Services/css/mdb.min.css">
    <link rel="stylesheet" href="/Services/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Services/css/fonts.css">
    <link rel="stylesheet" href="/Services/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/Services/css/style.css">
</head>

<body id="top">
    <nav id="navigation-menu" class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="/Services/index.html"><i class="fas fa-tools animated tada delay-0.2s infinite fa-sm fa-rotate-90"></i>&nbsp; Муж на час</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="text-center" id="navbarSupportedContent">
                <a class="nav-link btn btn-sm btn-orange btn-form cta-btn" href="profile.php">Профиль <i class="far fa-user animated tada delay-1s infinite ml-1"></i></a>
                <a class="nav-link btn btn-sm btn-orange btn-form cta-btn" href="/Services/index.html#cost">К списку услуг <i class="fas fa-pepper-hot animated tada delay-1s infinite ml-1"></i></a>
            </div>
        </div>
    </nav>
    <header id="main" class="bg_img_darker jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="text-center" style="width: 70%;">
            <div id="notificationContainer">
            </div>
            <h1 class="h1-responsive display-4" id="basketText">Содержимое корзины</h1>
            <hr class="hr-light-h">
            <table id="ordersTable">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <h1 class="lead hide" id="costText" style="margin-bottom: 8px;">Итого: </h1>
            <div class="flex-center">
                <button class="btn btn-lg btn-orange cta-btn mt-3 mb-5" onclick="$('#orderModal').modal('show');" id="checkoutButton">Оформить заказ&nbsp;
                    <i class="far fa-paper-plane animated tada delay-1s infinite ml-1"></i>
                </button>
            </div>
        </div>
    </header>
    <footer id="section-5" class="footer_bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <h4 class="h-form">Мои контакты</h4>
                    <div class="mt-5 mb-0 pl-3">
                        <p>
                            <i class="fas fa-home fa-sm text-danger mr-3"></i>город Минск, ул. Пушкина 12/45
                        </p>
                        <p>
                            <i class="fas fa-envelope text-danger fa-sm mr-3"></i>
                            <a href="mailto:muzhnachas@mail.ru" class="text-light">
                                Email: muzhnachas@mail.ru
                            </a>
                        </p>
                        <p>
                            <i class="fas fa-phone text-danger fa-sm mr-3"></i>
                            <a class="text-light" href="tel:375447858871">
                                +375(44)785-88-71
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-md-0 col-lg-4 mb-5">
                    <h4 class="h-form">Связаться</h4>
                    <div class="text-center m-5 d-none d-lg-block">
                        <button class="btn btn-orange cta-btn btn-form" data-toggle="modal" data-target="#exampleModal">Вызвать мастера <i class="far fa-paper-plane animated tada delay-1s infinite ml-1"></i></button>
                    </div>
                    <div class="text-center m-5 d-sm-block d-lg-none">
                        <a class="btn btn orange text-white text-center" type="button" href="tel:447859971">+375 (44)
                            785 88 71</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <h4 class="">Написать мне</h4>
                    <div class="col-md-12">
                        <div class="py-5 text-center">
                            <a class="mx-2"><i class="fab fa-instagram blue-text animated jello slow infinite delay-0.2s fa-2x"></i></a>
                            <a class="mx-2" title="Telegram" href=""><i class="fab fa-telegram text-info fa-2x animated tada slow infinite delay-0.4s"></i></a>
                            <a class="mx-2" href="" title="Viber"><i class="fab fa-viber text-viber fa-2x animated wobble slow infinite"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <a href="#top" type="button" class="back-to-top float-right __mPS2id mPS2id-clicked"><i class="far fa-arrow-alt-circle-up fa-2x text-danger"></i></a>
        </div>
        <div class="footer-copyright py-3 text-center">
            <span class="text-muted mx-auto"> © 2023 | Мастер на час</span>,
        </div>
    </footer>
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold" id="orderModalLabel">Оформить заказ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  mx-3">
                    <div id="contact" class="form-container">
                        <fieldset>
                            <div id="orderMessage"></div>
                            <form>
                                <div class="md-form mb-4">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input name="name" id="newName" type="text" value="<?php
                                                                                        $host = 'localhost';
                                                                                        $username = 'root';
                                                                                        $password = '';
                                                                                        $database = 'services';
                                                                                        $connection = mysqli_connect($host, $username, $password, $database);
                                                                                        if (!$connection) {
                                                                                            die("Ошибка подключения: " . mysqli_connect_error());
                                                                                        }
                                                                                        $login = $_COOKIE['login'];
                                                                                        $query = "SELECT `name` FROM `users` WHERE `login` = '$login'";
                                                                                        $result = mysqli_query($connection, $query);
                                                                                        if ($result) {
                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                            $name = $row['name'];
                                                                                            echo $name;
                                                                                        }
                                                                                        mysqli_close($connection);
                                                                                        ?>" placeholder="Имя" class="form-control" autocomplete="off" />
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-home prefix grey-text"></i>
                                    <input name="home" id="newAddress" type="text" value="<?php
                                                                                            $host = 'localhost';
                                                                                            $username = 'root';
                                                                                            $password = '';
                                                                                            $database = 'services';
                                                                                            $connection = mysqli_connect($host, $username, $password, $database);
                                                                                            if (!$connection) {
                                                                                                die("Ошибка подключения: " . mysqli_connect_error());
                                                                                            }
                                                                                            $login = $_COOKIE['login'];
                                                                                            $query = "SELECT `address` FROM `users` WHERE `login` = '$login'";
                                                                                            $result = mysqli_query($connection, $query);
                                                                                            if ($result) {
                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                $address = $row['address'];
                                                                                                echo $address;
                                                                                            }
                                                                                            mysqli_close($connection);
                                                                                            ?>" placeholder="Ваш адрес" class="form-control" autocomplete="off" />
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-phone prefix grey-text"></i>
                                    <input name="phone" id="newPhone" type="text" value="<?php
                                                                                            $host = 'localhost';
                                                                                            $username = 'root';
                                                                                            $password = '';
                                                                                            $database = 'services';
                                                                                            $connection = mysqli_connect($host, $username, $password, $database);
                                                                                            if (!$connection) {
                                                                                                die("Ошибка подключения: " . mysqli_connect_error());
                                                                                            }
                                                                                            $login = $_COOKIE['login'];
                                                                                            $query = "SELECT `phone` FROM `users` WHERE `login` = '$login'";
                                                                                            $result = mysqli_query($connection, $query);
                                                                                            if ($result) {
                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                $phone = $row['phone'];
                                                                                                echo $phone;
                                                                                            }
                                                                                            mysqli_close($connection);
                                                                                            ?>" placeholder="Телефон" class="form-control" autocomplete="off" />
                                </div>
                                <div class="editContent">
                                    <p class="small text-center"><span class="guardsman text-info">* Все поля для
                                            заполнения важны.</span></p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn unique-color-dark text-white" type="button" onclick="orderModal()">Отправить заказ</button>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold" id="exampleModalLabel">Обратная связь</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  mx-3">
                    <div id="contact" class="form-container">
                        <fieldset>
                            <div id="message"></div>
                            <form method="post" name="contactform" id="contactform">
                                <div class="md-form mb-4">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input name="name" id="name" type="text" value="" placeholder="Имя" class="form-control" autocomplete="off" />
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-home prefix grey-text"></i>
                                    <input name="home" id="home" type="text" value="" placeholder="Ваш адрес" class="form-control" autocomplete="off" />
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-phone prefix grey-text"></i>
                                    <input name="phone" id="phone" type="text" value="" placeholder="Телефон" class="form-control" autocomplete="off" />
                                </div>
                                <div class="md-form">
                                    <i class="fas fa-pencil prefix grey-text"></i>
                                    <textarea name="comments" id="comments" class="md-textarea form-control" rows="4" placeholder="Опишите задачу"></textarea>
                                    <div class="editContent">
                                        <p class="small text-center"><span class="guardsman text-info">* Все поля для
                                                заполнения важны.</span></p>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn unique-color-dark text-white" type="submit" id="cf-submit" name="submit">Отправить заказ</button>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Services/js/basket.js"></script>
    <script src="/Services/js/jquery-3.3.1.min.js"></script>
    <script src="/Services/js/bootstrap.min.js"></script>
    <script src="/Services/js/mdb.min.js"></script>
    <script src="/Services/js/wow.min.js"></script>
    <script src="/Services/js/owl.carousel.min.js"></script>
    <script src="/Services/js/counter.js"></script>
    <script src="/Services/js/typed.min.js"></script>
    <script src="/Services/js/jquery.malihu.PageScroll2id.min.js"></script>
    <script src="/Services/js/maskedinput.min.js"></script>
    <script src="/Services/js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            new WOW().init();
        });
    </script>
    <script type="text/javascript">
        function checkAuth() {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.indexOf('login=') === 0) {
                    return cookie.substring('login='.length, cookie.length);
                }
            }
            return null;
        }
        if (checkAuth() == null) {
            window.location.href = '/Services/index.html';
        }
    </script>
</body>

</html>