@extends('layouts.app')
@extends('layouts.section')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Ваша корзина</span>
                    <span class="badge badge-secondary badge-pill" id="quantity_checkout">{{ $quantity }}</span>
                </h4>
                <ul class="list-group mb-3 sticky-top">
                    <div id="checkout_cart_body">
                        @foreach($products as $product)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $product['name'] }}</h6>
                                    <small>- x{{$product['quantity']}}</small>
                                </div>
                                <span class="text-muted" style="white-space: nowrap;">{{ $product['quantity'] * $product['sum'] }} грн</span>
                            </li>
                        @endforeach
                    </div>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Всего</span>
                        <strong><span id="sum_checkout">{{ $sum }}</span> грн</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Данные для доставки</h4>
                <form class="needs-validation" autocomplete="off" action="javascript:void(0);" id="form_checkout">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Имя</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $user['name'] ?? null }}" required>
                            <div class="invalid-feedback"> Имя обязательна к заполнению. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Фамилия</label>
                            <input type="text" class="form-control" id="lastName" required placeholder="" value="{{ $user['LastName'] ?? null }}">
                            <div class="invalid-feedback"> Фамилия обязательна к заполнению. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Телефон </label>
                        <input type="text" class="form-control" id="phone" required placeholder="+38(0xx)xxxxxxx" value="{{ $user['phone'] ?? null }}">
                        <div class="invalid-feedback"> Телефон обязателен к заполенению. </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="regions">Область</label>
                            <input list="region-list" class="form-control d-block w-100" id="regions" required onchange="getCities()" value="{{ $user['region'] ?? null }}">

                            <datalist id="region-list">
                                <option value="">Выберете...</option>
                                @foreach($regions as $region)
                                    <option {{ $region == $user['region'] ? 'selected' : '' }} value="{{ $region }}">{{ $region }}</option>
                                @endforeach
                            </datalist>
                            <div class="invalid-feedback"> Область обязательна к заполенению. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cities">Город</label>
                            <input list="city-list" class="form-control d-block w-100" id="cities" onclick="checkRegion()" required onchange="getMailDepartment()" autocomplete="my-field-name1" value="{{ $user['cities'] ?? null }}">

                            <datalist id="city-list">
                                <option value="">Выберете...</option>
                                @if(!empty($user['cities']))
                                    @foreach($cities as $city)
                                        <option {{ $city['name'] == $user['cities'] ? 'selected' : '' }} value="{{ $city['name'] }}">{{ $city['name'] }}</option>
                                    @endforeach
                                @endif
                            </datalist>
                            <div class="invalid-feedback"> Город обязателен к заполенению. </div>
                        </div>
                        <div class="col-md-12 mb-12">
                            <label for="department">Отделение Новой Почты</label>
                            <select class="custom-select d-block w-100" id="department" onclick="checkCity()" required>
                                @if(!empty($user['department']))
                                    @foreach($departaments as $department)
                                        <option {{ $department['name'] == $user['department'] ? 'selected' : '' }} value="{{ $department['name'] }}">{{ $department['name'] }}</option>
                                    @endforeach
                                @endif
                            </select>

                            <div class="invalid-feedback"> Отделение новой почты обязателен к заполенению. </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="mb-3">
                        <label for="email">Комментарий <span class="text-muted">(Опционально)</span></label>
                        <textarea class="form-control" id="comment" placeholder="Комментарий к заказу"></textarea>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="submitForm()">Оформить заказ</button>
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
        document.addEventListener('reloadBasket', function (e) { reloadCheckoutBasket() }, false);
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
                let regions = data.regions;
                let html = '<option value="">Выберете...</option>';
                regions.forEach((value, index) => {
                    html += '<option value="'+ value +'">'+ value +'</option>';
                })
                $("#region-list").html(html);
                $("#loader").hide();
            }
        });
    }

    function getCities()
    {
        let region = $("#regions").val();
        $('#cities').val(null);
        $('#department').html('');
        $('#department').val(null);
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
                    if(data.isRegionExist){
                        let cities = data.cities;
                        let html = '<option value="">Выберете...</option>';
                        cities.forEach((value, index) => {
                            html += '<option value="'+ value.name +'">'+ value.name +'</option>';
                        })
                        $("#city-list").html(html);
                    } else {
                        swal({
                            text: 'Такой области не существует',
                            icon: "error",
                            buttons: false,
                            timer: 1000
                        });
                    }
                    $("#loader").hide();
                }
            });
        }
    }

    function getMailDepartment()
    {
        let city = $('#cities').val();
        let region = $('#regions').val();
        $('#department').html('');
        $('#department').val(null);
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
                if(data.isCityExist){
                    let postalOffices = data.postalOffices;
                    let html = '<option value="">Выберете...</option>';
                    postalOffices.forEach((value, index) => {
                        html += '<option value="'+ value.name +'">'+ value.name +'</option>';
                    })
                    $("#department").html(html);
                } else {
                    swal({
                        text: 'Такого города не существует',
                        icon: "error",
                        buttons: false,
                        timer: 1000
                    });
                }
                $("#loader").hide();
            }
        });
    }

    function checkRegion()
    {
        let region = $('#regions').val();
        if(!(region.length > 0)){
            swal({
                text: 'Сначала выберете область',
                icon: "error",
                buttons: false,
                timer: 1000
            });
        }
    }

    function checkCity()
    {
        let region = $('#regions').val();
        let city = $('#cities').val();
        if(!(region.length > 0)){
            swal({
                text: 'Сначала выберете область',
                icon: "error",
                buttons: false,
                timer: 1000
            });
        } else if(!(city.length > 0)){
            swal({
                text: 'Сначала выберете город',
                icon: "error",
                buttons: false,
                timer: 1000
            });
        }
    }

    function reloadCheckoutBasket()
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
                let products = data.products;
                let sum = data.sum;
                let quantity = data.quantity;
                if(sum <= 0){
                    document.location.reload();
                } else {
                    html = '';
                    products.forEach((value, index) => {
                        html += '                        <li class="list-group-item d-flex justify-content-between lh-condensed">\n' +
                            '                            <div>\n' +
                            '                                <h6 class="my-0"> '+ value.name +' </h6>\n' +
                            '                                <small>- x'+ value.quantity +'</small>\n' +
                            '                            </div>\n' +
                            '                            <span class="text-muted" style="white-space: nowrap;">'+ value.quantity * value.sum +' грн</span>\n' +
                            '                        </li>';
                    });
                    $('#checkout_cart_body').html(html);
                    $('#sum_checkout').text(sum);
                    $('#quantity_checkout').text(quantity);
                }
                $("#loader").hide();
            }
        });
    }

    function submitForm() {
        let form = $('#form_checkout')[0];

        if(form.checkValidity()){
            let firstName = $('#firstName').val();
            let lastName = $('#lastName').val();
            let phone = $('#phone').val();
            let regions = $('#regions').val();
            let cities = $('#cities').val();
            let department = $('#department').val();
            let comment = $('#comment').val();

            this.showLoading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
            });

            $.ajax({
                url: '/submitCheckout',
                data: {
                    firstName:firstName,
                    lastName:lastName,
                    phone:phone,
                    regions:regions,
                    cities:cities,
                    department:department,
                    comment:comment
                },
                method: 'post',
                success: function (data) {
                    if(data.result){
                        document.location.href = data.redirect;
                    }
                    $("#loader").hide();
                },
                error: function(data){
                    swal({
                        text: data.responseJSON.message,
                        icon: "error",
                        buttons: false,
                        timer: 1000
                    });
                    $("#loader").hide();
                }
            });
        }
    }
</script>
@endsection
