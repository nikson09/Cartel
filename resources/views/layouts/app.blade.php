<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cartel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}">
    <link rel="stylesheet" href="{{ asset('css/awesomplete.css') }}">
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
</head>
<body>
    <div id="app">
        <header id="header_mobile">
            <div class="header_top_mobile">
                <button id="zaebamba" class="btn btn-dark" type="button" >
                    <a href="/" class="navbar-brand_mobile">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </button>
                <button id="navbar-phone_mobile" class="btn btn-dark" type="button" >
                    <a href="tel:+380 73 001 7705" class="navbar-phone_mobile">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </a>
                </button>
                <button class="btn btn-dark" type="button" >
                    <a href="tel:+380 970017705" class="navbar-phone_mobile">
                        <i class="fa fa-phone-square"></i>
                    </a>
                </button>
                <button class="btn btn-dark dropdown-toggle mobile_search_find" type="button" data-toggle="collapse" data-target="#navbar-search_mobile" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
                <div id="navbar-search_mobile" class="dropdown-menu mobile_search collapse " style="">
                    <form id="search_mini_form" class="clearfix" action = "/bestsearch/" method = "GET">
                        <div class="formSearch">
                            <div class="formControl">
                                <input id="search" maxlength="100" type="text" name="s_search5" autocomplete="off" placeholder="Поиск по сайту...">
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="formSubmit">
                            <input id="search_submit_mobile" type = "submit" name = "submit" value="" title="Поиск">
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-dark mod_al" data-toggle="modal" data-target="#exampleModalLong">
                    Доставка
                </button>
                <button id="User_mobile" class="btn btn-dark dropdown-toggle" type="button" data-toggle="collapse" data-target="#navbar-user_mobile" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </button>

                <div id="navbar-user_mobile" class="dropdown-menu user_mobile">
                    <ul class="nav flex-column ">
                        @guest
                            <li><a href="/login"><i class="fa fa-lock"></i> Вход</a></li>
                            <li><a href="/register"><i class="fa fa-address-card"></i> Регистрация</a></li>
                        @else
                            <li><a href="/cabinet"><i class="fa fa-user"></i> Аккаунт</a></li>
                            <li><a href="/logout"><i class="fa fa-unlock"></i> Выход</a></li>
                        @endguest
                    </ul>
                </div>
                <button class="btn btn-dark count_mobile"  type="button" >
                    <a href="/cart/">
                        <i class="fa fa-shopping-cart"></i> (<span id="cart-count_mobile">0</span>)
                    </a>
                </button>
                <!--Контактная информа-->
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <a href="/" class="navbar-brand_mobile">
                            <img class="lazy" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="{{ asset('images/картель.png') }}" alt="" class="">
                        </a>
                        <div class="contact-info col-11 ">
                            <ul class="nav nav-pills">
                                <li class="mob_li">Работаем без выходных</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Оплата и доставка</h5>
                                    <button type="button " class="close " data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <H4>Оплата за товар производится:</H4>
                                    <h6>- Перечислением на банковскую карту (номер и сумму отправляем смс сообщением)</h6>
                                    <h6>- Наложенным платежом.</h6>
                                    Срок отправки товара с момента совершения заказа – до 3х дней.
                                    Стоимость отправки зависит от тарифов перевозчика (Новая почта).
                                    Обработка заказов – каждый день с 09.00 до 21.00
                                    Если Вы не нашли из нашего ассортимента то, что Вас интересовало, свяжитесь с нами по номеру (+380)730017705 или (+380)970017705
                                    <H4>Прочее</H4>
                                    Вся продукция сертифицирована и имеет документальное подтверждение в виде сертификата соответствия (отправляется вместе с товаром по просьбе заказчика).
                                    В соответствии с законодательством Украины в сфере алкогольной продукции, если алкогольный напиток крепостью до 8,5%, то он не подлежит акцизному маркированию.
                                    Вся импортная продукция разливается не на территории Украины.
                                    Этикетки, которые находятся на задней части бутылки (в некоторых случаях все этикетки на бутылке) заказываются компанией импортером и вместе с акцизными марками отправляются на завод изготовитель для последующей маркировки.
                                    <H4>....</H4>
                                    При предоставлении персональных данных на Сайте Магазина, Клиент дает свое добровольное согласие на обработку и использование (в том числе и передачу) своих персональных данных без ограничения срока действия такого согласия в соответствии с Законом Украины «О защите персональных данных» от 01.06.2010 г.
                                    Cайт Магазина вправе использовать персональные данные Клиента для оказания определенных настоящим договором услуг, в том числе и при помощи автоматизированной обработки персональных данных.
                                    Cайт Магазина берет на себя обязанность не разглашать персональные и контактные данные полученные от Клиента.
                                    Клиент несет ответственность за несоответствие своих персональных данных действительности.
                                    Cайт Магазина не несет ответственности за несоответствие персональных данных Клиента.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </header>

        <header id="header">
            <div class="focused"></div>
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="contact-info col-11 ">
                            <ul class="nav nav-pills">
                                <li class="yan" >Работаем без выходных</li>
                            </ul>
                        </div>
                        <div class="social-info">
                            <ul class="nav navbar-flex ">
                                <li ><a href="https://Facebook.com/drinkking.com.ua" class="fa fa-facebook"></a></li>
                                <li ><a href="https://www.instagram.com/drinkking.com.ua" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Контактная информа-->
            <div class="navbar navbar-inverse navbar-fixed-top pc">
                <div class="navbar_header ">
                    <div class="row">
                        <a href="/" class="navbar-brand">
                            <img class="lazy" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="{{ asset('images/картель.png') }}" alt="" class="">
                        </a>
                        <div class="modal fade" id="exampleModalLong_pc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Оплата и доставка</h5>
                                        <button type="button " class="close " data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <H4>Оплата за товар производится:</H4>
                                        <h6>- Перечислением на банковскую карту (номер и сумму отправляем смс сообщением)</h6>
                                        <h6>- Наложенным платежом.</h6>
                                        Срок отправки товара с момента совершения заказа – до 3х дней.
                                        Стоимость отправки зависит от тарифов перевозчика (Новая почта).
                                        Обработка заказов – каждый день с 09.00 до 21.00
                                        Если Вы не нашли из нашего ассортимента то, что Вас интересовало, свяжитесь с нами по номеру (+380)730017705 или (+380)970017705
                                        <H4>Прочее</H4>
                                        Вся продукция сертифицирована и имеет документальное подтверждение в виде сертификата соответствия (отправляется вместе с товаром по просьбе заказчика).
                                        В соответствии с законодательством Украины в сфере алкогольной продукции, если алкогольный напиток крепостью до 8,5%, то он не подлежит акцизному маркированию.
                                        Вся импортная продукция разливается не на территории Украины.
                                        Этикетки, которые находятся на задней части бутылки (в некоторых случаях все этикетки на бутылке) заказываются компанией импортером и вместе с акцизными марками отправляются на завод изготовитель для последующей маркировки.
                                        <H4>....</H4>
                                        При предоставлении персональных данных на Сайте Магазина, Клиент дает свое добровольное согласие на обработку и использование (в том числе и передачу) своих персональных данных без ограничения срока действия такого согласия в соответствии с Законом Украины «О защите персональных данных» от 01.06.2010 г.
                                        Cайт Магазина вправе использовать персональные данные Клиента для оказания определенных настоящим договором услуг, в том числе и при помощи автоматизированной обработки персональных данных.
                                        Cайт Магазина берет на себя обязанность не разглашать персональные и контактные данные полученные от Клиента.
                                        Клиент несет ответственность за несоответствие своих персональных данных действительности.
                                        Cайт Магазина не несет ответственности за несоответствие персональных данных Клиента.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d7">
                            <form id="form" action = "/bestsearch/" method = "GET">
                                <div class="row">
                                    <div class="search ">
                                        <input type="text" name="s_search5" autocomplete="off" placeholder="Поиск по сайту..." >
                                    </div>
                                    <div class="input_search">
                                        <input id="search_submit" type = "submit" name = "submit" value="" title="Поиск">
                                    </div>
                                </div>
                            </form >
                        </div>
                        <div class="auth noAuth topNavBlock">
                            @guest
                                <p>
                                    <a href="/register/">Регистрация</a> | <a href="/login/">Вход</a>
                                </p>
                            @else
                            <p>
                                <a href="/cabinet/"> Аккаунт</a> | <a href="/logout/">Выход</a></p>
                            @endguest
                            <div class="modal_button">
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong_pc">
                                <span>Оплата и Доставка
                                </span>
                                </button>
                            </div>
                        </div>
                        <div class="mainTel topNavBlock">
                            <p>
                                <a href="tel:+380 73 001 7705" >Онлайн маркет</a>
                            </p>
                            <span class="number-1">(073)0017705</span>
                            <span class="number-1">(097)0017705</span></div>
                        <div class="fullListTell">
                            <div class="forScroll" style="max-height: 182px;">
                                <p class="h2">интернет-магазин</p>
                                <div class="infoTelBlock clearfix">
                                    <div class="left">
                                        <div>
                                            <p>
                                        <span style="text-decoration: underline;">
                                            <span style="color: #000000;">
                                                <a href="http://drinkking.com.ua/">
                                                    <span style="color: #000000; text-decoration: underline;">Cartel</span>
                                                </a>
                                            </span>
                                        </span>
                                            </p>
                                            <p>
                                                <span class="number-2">(097) 001 77 01</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div>
                                            <p><span>Пн.-Пт.</span> 9:00-21:00</p>
                                            <p><span>Сб.</span> 10:00-18:00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cartTopBlock">
                            <a href="/cart/" class="cartLink topNavBlock">
                                <p id="cart-count" class="mobile-hidden">Корзина: 0</p>
                                <span class="mobile-hidden">0<span>грн</span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--Корзина и авторизация-->

    <div class="container">
        <div class="journal-menu">
            <ul class="super-menu mobile-menu menu-floated">
                @foreach(\App\BarMenu::where('active', true)->get() as $barMenu)
                <li class="drop-down float-left main-menu-item-1">
                    <a href="{{ $barMenu->href }}" style="background-image: url({{ Storage::url('public/bar-menu/'. $barMenu->image) }});">
                        <span class="main-menu-text">{{ $barMenu->name }}</span>
                    </a>
                    <span class="mobile-plus">+</span>
                </li>
                @endforeach
            </ul>
        </div><!--Главное меню Алкоголя-->
    </div>
    </header>
        <main class="py-4">
            <div class="container">
                <div class="row">
                    @yield('content_right')
                    <div class="col-9" >
                        <div class="features_items"><!--features_items-->
                            <div class="Items_Back">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <footer id="footer"><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="col-4"><img class="lazy autor" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="{{ asset('images/autor.png') }}" alt="" class="autor"></p>

                    <p class="col-8 text-sm-right"><img class="lazy autor_site" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="{{ asset('images/картель.png') }}" alt=""></p>
                </div>
            </div>
        </div>
        <div id="loader" class="loader">
            <div class="l_main">
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
            </div>
        </div>
    </footer>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(window).on('load', function() {
        setTimeout(function () {
            $("#loader").delay(0.50).fadeOut().remove();
        },);
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158841020-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-158841020-1');
    gtag('set', {'user_id': 'USER_ID'}); // Задание идентификатора пользователя с помощью параметра user_id (текущий пользователь).
</script>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PM5LZTF"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<script type="text/javascript">
    [].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function() {
            img.removeAttribute('data-src');
        };
    });
</script>
<script src="//code.jivosite.com/widget/HnMGnSsPrd" async></script>
</html>
