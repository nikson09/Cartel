<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cartel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link  rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">

        @yield('style')
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</html>

<style>
    /*! CSS Used from: https://b2b.moysklad.ru/css/iframes-d46cac14f8691eae307c78437ffa8c1b.css */
    *,*::before,*::after{box-sizing:border-box;}
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-min-d3a8bda02c2c4a82338fcc8eb1524e92.css */
    a{background-color:transparent;}
    img{border-style:none;max-width:100%;vertical-align:middle;}
    button,input{margin:0;font-size:100%;line-height:1.15;font-family:inherit;}
    button,input{overflow:visible;}
    button{text-transform:none;}
    [type=button],button{-webkit-appearance:button;}
    [type=button]::-moz-focus-inner,button::-moz-focus-inner{padding:0;border-style:none;}
    [type=button]:-moz-focusring,button:-moz-focusring{outline:1px dotted ButtonText;}
    *,::after,::before{box-sizing:border-box;}
    p{margin:0;}
    .container{width:100%;min-width:984px;max-width:1440px;margin:0 auto;padding:0 20px;}
    .customer-name span{font-weight:700;}
    .page-header{margin-bottom:22px;padding:20px 0;}
    .page-header-columns .container{display:flex;justify-content:space-between;}
    .page-header-logo{display:flex;align-items:center;padding:10px 0;}
    .page-header-logo a{display:block;margin-top:-4px;}
    .page-header-title{margin-left:20px;font-size:18px;}
    .page-header-search{margin-top:32px;}
    .page-header-columns .page-header-main{width:55%;max-width:780px;padding-right:20px;}
    .page-header-columns .page-header-customer{min-width:368px;padding-top:4px;padding-right:8px;}
    .search{display:flex;align-items:center;}
    .search-field{position:relative;width:100%;}
    .search-field::before{content:'';position:absolute;top:50%;left:15px;width:20px;height:20px;background-image:url(https://b2b.moysklad.ru/images/icon-search-3779a81cf79a7537b86528a0f8ba59b9.svg);background-repeat:no-repeat;background-size:20px 20px;transform:translateY(-50%);}
    .search-field input{width:100%;height:50px;padding-right:50px;padding-left:40px;background-color:transparent;border:solid 2px #cbd9f9;border-radius:3px;outline:0;transition:.2s ease border-color;}
    .search-field input::-ms-clear{display:none;}
    .search-field input:focus{border-color:#2855af;}
    .search-field input::-webkit-input-placeholder{color:#232d4b;color:rgba(35,45,75,.5);}
    .search-field input:-moz-placeholder,.search-field input::-moz-placeholder{color:#232d4b;color:rgba(35,45,75,.5);}
    .search-field input:-ms-input-placeholder{color:#232d4b;color:rgba(35,45,75,.5);}
    .search-button button,.search-reset{background-color:transparent;outline:0;cursor:pointer;}
    .search-reset{position:absolute;top:0;right:0;display:none;width:50px;height:100%;padding:10px;background-image:url(https://b2b.moysklad.ru/images/icon-close-1d51405a8065089404d516ddb54fd7b7.svg);background-repeat:no-repeat;background-position:50% 50%;background-size:20px 20px;border:0;}
    .search-reset:active{opacity:.8;}
    .search-button{margin-left:20px;}
    .search-button button{height:50px;padding:10px 44px;font-weight:700;font-size:14px;line-height:1.43;color:#2855af;border:solid 2px #2855af;border-radius:10px;transition:.2s ease background-color,.2s ease color;}
    .search-button button:focus,.search-button button:hover{color:#fff;background-color:#2855af;}
    .search-button button:active{opacity:.8;}
    .customer{width:100%;padding:10px 10px 10px 15px;background-color:#e1e6f0;background-color:rgba(225,230,240,.65);border-radius:3px;}
    .customer-data{margin:0;padding:0;list-style:none;}
    .customer-data li{font-size:12px;line-height:1.67;}
    .customer-info{color:#34588d;}
    .customer-info span{color:#38639b;color:rgba(56,99,155,.5);}
    .customer-bottom{display:flex;justify-content:space-between;align-items:center;padding-top:10px;}
    .customer-total{margin-right:20px;font-size:18px;white-space:nowrap;}
    .customer-total span{font-weight:700;}
    .customer-num{margin-left:5px;}
    .customer-currency{font-size:14px;}
    .customer-button{display:inline-block;padding:5px 11px;font-weight:700;font-size:14px;line-height:1.43;color:#fff;text-decoration:none;white-space:nowrap;background-color:#2855af;border-radius:8px;outline:0;transition:.2s ease background-color;}
    .customer-button:focus,.customer-button:hover{background-color:#234187;}
    .customer-button:active{opacity:.8;}
    @media (min-width:1200px){
        .container{padding:0 40px;}
        .page-header-columns .page-header-main{width:60%;}
        .search-field input{font-size:18px;}
    }
    @media (min-width:1366px){
        .page-header-columns .page-header-main{width:67.2%;}
    }
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-5c868956a1993edbe1167f3ae9367a07.css */
    .button-disabled{pointer-events:none;opacity:.35;}
    ::placeholder{font-size:16px;color:#9196A5;margin:0px 15px;}
</style>
