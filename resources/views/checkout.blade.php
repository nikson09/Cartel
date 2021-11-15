@extends('layouts.app')
@extends('layouts.section')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Ваша корзина</span>
                    <span class="badge badge-secondary badge-pill">{{ $quantity }}</span>
                </h4>
                <ul class="list-group mb-3 sticky-top">
                    @foreach($products as $product)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $product['name'] }}</h6>
                                <small>- x{{$product['quantity']}}</small>
                            </div>
                            <span class="text-muted" style="white-space: nowrap;">{{ $product['quantity'] * $product['sum'] }} грн</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Всего</span>
                        <strong><span id="sum_checkout">{{ $sum }}</span> грн</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Данные для доставки</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Имя</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="true">
                            <div class="invalid-feedback"> Имя обязательна к заполнению. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Фамилия</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="true">
                            <div class="invalid-feedback"> Фамилия обязательна к заполнению. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Телефон </label>
                        <input type="text" class="form-control" id="phone" placeholder="+38(0xx)xxxxxxx">
                        <div class="invalid-feedback"> Телефон обязателен к заполенению. </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <label for="country">Область</label>
                            <input class="form-control d-block w-100" id="regions" required="true" onchange="getCities()"/>
                            <div class="invalid-feedback"> Область обязательна к заполенению. </div>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="state">Город</label>
                            <input class="form-control d-block w-100" id="cities" required="true" onchange="getMailDepartment()"/>
                            <div class="invalid-feedback"> Город обязателен к заполенению. </div>
                        </div>
                        <div class="col-md-12 mb-12">
                            <label for="zip">Отделение Новой Почты</label>
                            <input class="form-control d-block w-100" id="department" required="true"/>
                            <div class="invalid-feedback"> Отделение новой почты обязателен к заполенению. </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="mb-3">
                        <label for="email">Комментарий <span class="text-muted">(Опционально)</span></label>
                        <textarea type="email" class="form-control" id="comment" placeholder="Комментарий к заказу"></textarea>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Оформить заказ</button>
                    <hr class="mb-4">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script>
    $(function(){
        getRegions()
        getCities()
    });

    function getRegions()
    {
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/getRegions',
            data: {},
            method: 'get',
            success: function (data) {
                let options = {
                    data: data,
                    list: {
                        match: {
                            enabled: true
                        }
                    },
                    theme: "square"
                };
                $("#regions").easyAutocomplete(options);
                $("#loader").hide();
            }
        });
    }

    function getCities()
    {
        let region = $("#regions").val();
        if(region.length > 3){
            this.showLoading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
            });

            $.ajax({
                url: '/getRegionCities',
                data: {
                    region:region
                },
                method: 'get',
                success: function (data) {
                    let options = {
                        data: data,
                        getValue: "name",
                        list: {
                            match: {
                                enabled: true
                            }
                        },
                        theme: "square"
                    };
                    $("#cities").easyAutocomplete(options);
                    $("#loader").hide();
                }
            });
        }
    }

    function getMailDepartment()
    {
        let city = $('#cities').val();
        let region = $('#regions').val();
        this.showLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        $.ajax({
            url: '/getPostalOffices',
            data: {
                city: city,
                region: region
            },
            method: 'get',
            success: function (data) {
                let options = {
                    data: data,
                    getValue: "name",
                    list: {
                        match: {
                            enabled: true
                        }
                    },
                    theme: "square"
                };
                $("#department").easyAutocomplete(options);
                $("#loader").hide();
            }
        });
    }
</script>
@endsection
