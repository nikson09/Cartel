<div class="sidebar">
    <div class="sidebar-wrapper">
{{--        <div class="logo">--}}
{{--            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>--}}
{{--            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>--}}
{{--        </div>--}}
        <ul class="nav">
            <li @if ($pageSlug == 'main') class="active " @endif>
                <a href="{{ route('admin_home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Главная</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="false">
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text" >Настройки администратора</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-single-02 disabled"></i>
                                <p>Профиль</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-bullet-list-67 disabled"></i>
                                <p>Пользователи</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#menu" aria-expanded="false">
                    <i class="tim-icons icon-app" ></i>
                    <span class="nav-link-text" >Меню</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="menu">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'categories') class="active " @endif>
                            <a href="{{ route('admin_categories') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Категории</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'bar-menu') class="active " @endif>
                            <a href="{{ route('admin_barMenus') }}">
                                <i class="tim-icons icon-credit-card"></i>
                                <p>Бар Меню</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'countries') class="active " @endif>
                            <a href="{{ route('admin_countries') }}">
                                <i class="tim-icons icon-world"></i>
                                <p>Страны</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'brands') class="active " @endif>
                            <a href="{{ route('admin_brands') }}">
                                <i class="tim-icons icon-globe-2"></i>
                                <p>Бренды</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'banners') class="active " @endif>
                            <a href="{{ route('admin_banners') }}">
                                <i class="tim-icons icon-globe-2"></i>
                                <p>Баннеры</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#products" aria-expanded="false">
                    <i class="tim-icons icon-bag-16" ></i>
                    <span class="nav-link-text" >Каталог</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="products">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'products') class="active " @endif>
                            <a href="{{ route('admin_products') }}">
                                <i class="tim-icons icon-paper"></i>
                                <p>Продукты</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'product_attributes') class="active " @endif>
                            <a href="{{ route('admin_product_attributes') }}">
                                <i class="tim-icons icon-tag"></i>
                                <p>Атрибуты продуктов</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
{{--            <li @if ($pageSlug == 'maps') class="active " @endif>--}}
{{--                <a href="#">--}}
{{--                    <i class="tim-icons icon-pin"></i>--}}
{{--                    <p>{{ __('Maps') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li @if ($pageSlug == 'notifications') class="active " @endif>--}}
{{--                <a href="#">--}}
{{--                    <i class="tim-icons icon-bell-55"></i>--}}
{{--                    <p>{{ __('Notifications') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li @if ($pageSlug == 'tables') class="active " @endif>--}}
{{--                <a href="#">--}}
{{--                    <i class="tim-icons icon-puzzle-10"></i>--}}
{{--                    <p>{{ __('Table List') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li @if ($pageSlug == 'typography') class="active " @endif>--}}
{{--                <a href="#">--}}
{{--                    <i class="tim-icons icon-align-center"></i>--}}
{{--                    <p>{{ __('Typography') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li @if ($pageSlug == 'rtl') class="active " @endif>--}}
{{--                <a href="#">--}}
{{--                    <i class="tim-icons icon-world"></i>--}}
{{--                    <p>{{ __('RTL Support') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">--}}
{{--                <a href="#">--}}
{{--                    <i class="tim-icons icon-spaceship"></i>--}}
{{--                    <p>{{ __('Upgrade to PRO') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
