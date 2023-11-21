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
                <a class="nav-link btn btn-sm btn-orange btn-form cta-btn" onclick="$('#searchModal').modal('show')">Профиль пользователя <i class="fas fa-user animated tada delay 1-s infinite ml-1"></i></a>
                <a class="nav-link btn btn-sm btn-orange btn-form cta-btn" onclick="readRequests()">Обратные звонки <i class="fas fa-phone animated tada delay 1-s infinite ml-1"></i></a>
                <a class="nav-link btn btn-sm btn-orange btn-form cta-btn" href="/Services/index.html">На главную <i class="fas fa-globe animated tada delay-1s infinite ml-1"></i></a>
                <a class="nav-link btn btn-sm btn-orange btn-form cta-btn" onclick="doLogout()">Выйти <i class="fas fa-door-open animated tada delay-1s infinite ml-1"></i></a>
            </div>
        </div>
    </nav>
    <header id="main" class="bg_img_darker jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="text-center" style="width: 70%;">
            <div id="notificationContainer">
            </div>
            <h1 class="h1-responsive display-4" id="basketText">Актуальные заказы</h1>
            <hr class="hr-light-h">
            <table id="ordersTable">
                <thead>
                    <tr>
                        <th>Логин</th>
                        <th>Название</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </header>
    <footer id="section-5" class="footer_bg" style="padding-top:0;">
        <div class="footer-copyright py-3 text-center">
            <span class="text-muted"> © 2023 | Мастер на час</span>,
        </div>
    </footer>
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold" id="historyModalLabel">Профиль пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  mx-3">
                    <div id="contact" class="form-container">
                        <fieldset>
                            <div id="message"></div>
                            <form id="searchUserForm">
                                <div class="md-form mb-4">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input name="login" id="searchLogin" type="text" value="" placeholder="Логин" class="form-control" autocomplete="off" />
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn unique-color-dark text-white" type="button" onclick="searchUser()">Поиск</button>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 800px">
            <div class="modal-content" style="min-height: 300px">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold" id="historyModalLabel">История заказов</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  mx-3">
                    <div id="contact" class="form-container">
                        <fieldset>
                            <div id="historyMessage"></div>
                            <table id="historyTable" class="text-center">
                                <tbody></tbody>
                            </table>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold" id="userModalLabel">userid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  mx-3">
                    <div id="contact" class="form-container">
                        <fieldset>
                            <div id="message"></div>
                            <div class="md-form">
                                <p class="lead black-text" id="profileModalLogin">login</p>
                            </div>
                            <div class="md-form">
                                <p class="lead black-text" id="profileModalName">name</p>
                            </div>
                            <div class="md-form">
                                <p class="lead black-text" id="profileModalPhone">phone</p>
                            </div>
                            <div class="md-form">
                                <p class="lead black-text" id="profileModalAddress">address</p>
                            </div>
                            <div class="md-form">
                                <p class="lead black-text" id="profileModalIsAdmin">isAdmin</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn unique-color text-white" type="button" onclick="orderHistory()">История заказов</button>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="callsModal" tabindex="-1" role="dialog" aria-labelledby="callsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 600px">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold" id="callsModalLabel">Обратные звонки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  mx-3">
                    <div id="contact" class="form-container">
                        <fieldset>
                            <div id="callsMessage"></div>
                            <table id="callsTable" class="text-center mb-2">
                                <tbody></tbody>
                            </table>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn unique-color-dark text-white" type="button" onclick="clearCalls()">Очистить список</button>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Services/js/contact.js"></script>
    <script src="/Services/js/admin.js"></script>
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

        function checkAdmin() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'adminState.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response == 'Admin') return true;
                    else return false;
                }
            }
            xhr.send("login=" + checkAuth());
        }
        if (checkAuth() == null && checkAdmin() == false) {
            window.location.href = '/Services/index.html';
        }
    </script>
</body>

</html>