@section('content_right')
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h4 id="categor_name">Личный кабинет</h4>
            <div class="panel-group category-products">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a href="/cabinet">
                                Главная
                            </a>
                        </h6>
                    </div>
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a href="{{ route('cabinet.orders') }}">
                                Заказы
                            </a>
                        </h6>
                    </div>
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a href="/logout">
                                Выход
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
