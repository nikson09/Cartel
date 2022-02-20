<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cartel') }}</title>

    <!-- Scripts -->

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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
    <style>
        .mobile-body{
            min-height: 50vw;
        }

    </style>
    @yield('style')
</head>
<body>
    <div id="app">
        <header id="header" v-if="!isMobile">
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
                            <div style="display: block;position: absolute;">
                                <span class="number-1">(073)0017705</span>
                                <span class="number-1">(097)0017705</span>
                            </div>
                        </div>
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
                            <a href="javascript:void(0);" class="cartLink topNavBlock" onclick="openBasket()">
                                <p class="mobile-hidden">Корзина: <span id="cart-count">0</span></p>
                                <span class="mobile-hidden"><span id="cart-sum">0</span>&nbsp;грн</span>
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
        @yield('content_for_banners')
        <main class="py-4" id="desktop" v-if="!isMobile">
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
        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Корзина
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="basket-modal-body">
                            <div class="d-flex justify-content-end" style="margin-bottom: 1vw;">
                                <button type="button" class="btn btn-outline-danger" onclick="removeAllProductsFromBasket()">Очистить корзину</button>
                            </div>
                            <table class="table table-image">
                                <thead>
                                <tr>
                                    <th scope="col">Изображение</th>
                                    <th scope="col">Наименование</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Количество</th>
                                    <th scope="col">Всего</th>
                                    <th scope="col">Убрать товар</th>
                                </tr>
                                </thead>
                                <tbody id="cart-body">

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                <h5>Всего: <span class="price text-primary"><span id="total_cart_sum">0</span> грн</span></h5>
                            </div>
                        </div>
                        <p class="text-center" id="cart-is-empty">Корзина Пустая</p>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Закрыть</button>
                        <a type="button" class="btn btn-outline-primary" id="checkout_button" href="/checkout">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    <footer id="footer" v-if="!isMobile"><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="col-4"><img class="lazy autor" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="{{ asset('images/autor.png') }}" alt="" class="autor"></p>

                    <p class="col-8 text-sm-right">
                        <img class="lazy autor_site" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="{{ asset('images/картель.png') }}" alt="">
                    </p>
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
        <header-mobile v-if="isMobile"
                       :categories="{{ \App\Category::whereNull('parent')->get() }}"
                       :guest=" @guest true @else false @endguest"
        ></header-mobile>
            <div class="mobile-body" v-if="isMobile">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
                      rel="stylesheet">
                @if(isset($banners))
                    <banners :banners="{{ $banners }}"></banners>
                @endif
                @yield('content-mobile')
            </div>
        <footer-mobile v-if="isMobile"></footer-mobile>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(window).on('load', function() {
        setTimeout(function () {
            $("#loader").delay(0.50).fadeOut().hide();
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
<script src="//code-eu1.jivosite.com/widget/b6XwypSHio" async></script>
<script src="{{ asset('js/jquery.cycle2.min.js')}}"></script>
<script src="{{ asset('js/jquery.cycle2.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

<script type="text/javascript">
    $(function(){
        if(screen.width <= 600){
            // $('#header').remove();
            // $('#footer').remove();
            // $('#desktop').remove();
        }
        getBasket();
    });

    function showLoading()
    {
        $("#loader").show();
    }

    function hideLoading()
    {
        $("#loader").delay(0.50).fadeOut().hide();
    }

    function getBasket()
    {
        let basketCount = $('#cart-count');
        let basketSum = $('#cart-sum');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/getBasket',
            method: 'get',
            success: function (data) {
                basketCount.text(data.quantity);
                basketSum.text(data.sum);
            }
        });
    }

    function addToBasketOneProduct(id)
    {
        let quantity = 1;
        let productId = id;
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/addProductToBasket',
            data: {
                quantity: quantity,
                productId: productId
            },
            method: 'post',
            success: function(data){
                $("#loader").hide();
                if(data.result){
                    swal({
                        text: "Товар успешно добавлен в корзину!",
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    });
                    getBasket()
                }
            },
            error: function(error){
                $("#loader").hide();
                swal({
                    text: error,
                    icon: "error",
                    buttons: false,
                    timer: 1000
                });
            },
        });
    }

    function openBasket()
    {
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/fetchBasketProducts',
            data: {},
            method: 'get',
            success: function(data){
                $("#loader").hide();
                let products = data.products;
                let notRelatedProducts = data.notRelatedProducts;
                if(data.sum <= 0){
                    $('#basket-modal-body').hide();
                    $('#checkout_button').hide();
                    $('#cart-is-empty').show();
                } else {
                    let html = drawPage(products);
                    html = html + drawPage(notRelatedProducts);
                    $('#cart-body').html(html);
                    $('#total_cart_sum').text(data.sum);

                    $('#basket-modal-body').show();
                    $('#checkout_button').show();
                    $('#cart-is-empty').hide();
                }
                $('#cartModal').modal('show');
            },
            error: function(error){
                $("#loader").hide();
            },
        });
    }

    function reloadBasket()
    {
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/fetchBasketProducts',
            data: {},
            method: 'get',
            success: function (data) {
                $("#loader").hide();
                let products = data.products;
                let notRelatedProducts = data.notRelatedProducts;
                if(data.sum <= 0){
                    $('#basket-modal-body').hide();
                    $('#checkout_button').hide();
                    $('#cart-is-empty').show();
                } else {
                    let html = drawPage(products);
                    html = html + drawPage(notRelatedProducts);
                    $('#cart-body').html(html);
                    $('#total_cart_sum').text(data.sum);
                    $('#basket-modal-body').show();
                    $('#checkout_button').show();
                    $('#cart-is-empty').hide();
                }
                let event = new Event('reloadBasket');
                document.dispatchEvent(event);
            }
        });
    }

    function basketProductMinus(id)
    {
        let productId = id;
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/removeOneProductFromBasket',
            data: {
                productId: productId
            },
            method: 'post',
            success: function(data){
                $("#loader").hide();
                if(data.result){
                    reloadBasket();
                    getBasket();
                }
            },
            error: function(error){
                $("#loader").hide();
                swal({
                    text: error,
                    icon: "error",
                    buttons: false,
                    timer: 1000
                });
            },
        });
    }

    function basketProductPlus(id)
    {
        let quantity = 1;
        let productId = id;
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/addProductToBasket',
            data: {
                quantity: quantity,
                productId: productId
            },
            method: 'post',
            success: function(data){
                $("#loader").hide();
                if(data.result){
                    reloadBasket();
                    getBasket();
                }
            },
            error: function(error){
                $("#loader").hide();
                swal({
                    text: error,
                    icon: "error",
                    buttons: false,
                    timer: 1000
                });
            },
        });
    }

    function drawPage(products)
    {
        let html = '';
        products.forEach((value, index) => {
            let isProductExist = value.isRelated ? "" : "productHasRunOut";
            let productJustForPreOrder = value.isRelated ? "" : "</br>(По предзаказу)";
            html += '                            <tr class="'+ isProductExist +'">\n' +
                '                                <td>\n' +
                '                                    <img style="width: 12vw;height: auto" src="/storage/products/'+ value.image +'" class="img-fluid img-thumbnail" alt="Sheep">\n' +
                '                                </td>\n' +
                '                                <td class="text-center">'+ value.name + productJustForPreOrder +'</td>\n' +
                '                                <td style="white-space: nowrap;" class="text-primary">'+ value.sum +' грн</td>\n' +
                '                                <td class="qty">' +
                '<div class="counter-inner counter-inner--cart clr rel">\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="down down--float" onclick="basketProductMinus('+ value.id +');">-</span>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" maxlength="7" onkeyup="changeQuantity('+ value.id +', this);" value="'+value.quantity+'" class="input--count countInput clearCError">\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="up up--float" onclick="basketProductPlus('+ value.id +');">+</span>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t</div></td>\n' +
                '                                <td style="white-space: nowrap;" class="text-primary">'+ (parseInt(value.sum) * parseInt(value.quantity)) +' грн</td>\n' +
                '                                <td>\n' +
                '                                    <a href="javascript:void(0);" onclick="removeOneProductFromBasket('+ value.id +', '+ value.isRelated +')" class="btn btn-danger btn-sm button-circle">\n' +
                '                                        <i class="fa fa-times"></i>\n' +
                '                                    </a>\n' +
                '                                </td>\n' +
                '                            </tr>';
        });
        return html;
    }

    function drawPageOrder(products)
    {
        let html = '';
        products.forEach((value, index) => {
            let isProductExist = !value.isPreOrder ? "" : "productHasRunOut";
            let productJustForPreOrder = !value.isPreOrder ? "" : "</br>(По предзаказу)";

            html += '                            <tr class="'+ isProductExist +'">\n' +
                '                                <td>\n' +
                '                                    <img style="width: 12vw;height: auto" src="/storage/products/'+ value.image +'" class="img-fluid img-thumbnail" alt="Sheep">\n' +
                '                                </td>\n' +
                '                                <td>'+ value.name + productJustForPreOrder +'</td>\n' +
                '                                <td style="white-space: nowrap;" class="text-primary">'+ value.sum +' грн</td>\n' +
                '                                <td class="qty">' +
                '<div class="counter-inner counter-inner--cart clr rel" style="background-color: #e7e7e7;\n' +
                '    border-radius: 0.5vw;\n' +
                '    height: auto !important;\n' +
                '    padding: 0vw !important;\n' +
                '    display: inline-block;\n' +
                '    vertical-align: middle;\n' +
                '    margin: 0 0.5vw 0 0;\n' +
                '    width: auto !important;">\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" maxlength="7" disabled onkeyup="changeQuantity('+ value.id +', this);" value="'+value.quantity+'" class="input--count countInput clearCError">\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t</div></td>\n' +
                '                                <td style="white-space: nowrap;" class="text-primary">'+ (parseInt(value.sum) * parseInt(value.quantity)) +' грн</td>\n' +
                '                                <td>\n' +
                '                                </td>\n' +
                '                            </tr>';
        });
        return html;
    }

    function changeQuantity(id, that)
    {
        let quantity = $(that).val();
        let productId = id;
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/changeQuantityProductInBasket',
            data: {
                quantity: quantity,
                productId: productId
            },
            method: 'post',
            success: function(data){
                $("#loader").hide();
                if(data.result){
                    reloadBasket();
                    getBasket();
                }
            },
            error: function(error){
                $("#loader").hide();
                swal({
                    text: error,
                    icon: "error",
                    buttons: false,
                    timer: 1000
                });
            },
        });
    }

    function removeAllProductsFromBasket() {
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/removeAllBasket',
            data: {

            },
            method: 'post',
            success: function(data){
                $("#loader").hide();
                if(data.result){
                    reloadBasket();
                    getBasket();
                }
            },
            error: function(error){
                $("#loader").hide();
                swal({
                    text: error,
                    icon: "error",
                    buttons: false,
                    timer: 1000
                });
            },
        });
    }

    function removeOneProductFromBasket(id, isRelated)
    {
        let productId = id;
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/removeOneProductFromBasket',
            data: {
                productId: productId,
                removeAll: true,
                isRelated: isRelated
            },
            method: 'post',
            success: function(data){
                $("#loader").hide();
                if(data.result){
                    reloadBasket();
                    getBasket();
                }
            },
            error: function(error){
                $("#loader").hide();
                swal({
                    text: error,
                    icon: "error",
                    buttons: false,
                    timer: 1000
                });
            },
        });
    }
</script>
@yield('scripts')
</html>
