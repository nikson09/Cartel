@extends('layouts.app')
@extends('layouts.cabinet')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 order-md-12">
                <h4 class="mb-3">Данные для доставки</h4>
                <form class="needs-validation" autocomplete="off" action="javascript:void(0);" id="form_checkout">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Имя</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $user['name'] }}" required>
                            <div class="invalid-feedback"> Имя обязательна к заполнению. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Фамилия</label>
                            <input type="text" class="form-control" id="lastName" required placeholder="" value="{{ $user['LastName'] }}">
                            <div class="invalid-feedback"> Фамилия обязательна к заполнению. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Телефон </label>
                        <input type="text" class="form-control" id="phone" required placeholder="+38(0xx)xxxxxxx" value="{{ $user['phone'] }}">
                        <div class="invalid-feedback"> Телефон обязателен к заполенению. </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="regions">Область</label>
                            <input list="region-list" class="form-control d-block w-100" id="regions" required onchange="getCities()" value="{{ $user['region'] }}">
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
                            <input list="city-list" class="form-control d-block w-100" id="cities" onclick="checkRegion()" required onchange="getMailDepartment()" autocomplete="my-field-name1" value="{{ $user['cities'] }}">

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
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="submitForm()">Сохранить</button>
                    <hr class="mb-4">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content-mobile')
    <div class="container" style="margin-top: 2vw">
        <div class="row">
            <div class="col-md-12 order-md-12">
                <h4 class="mb-3">Данные для доставки</h4>
                <form class="needs-validation" autocomplete="off" action="javascript:void(0);" id="form_checkout">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Имя</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $user['name'] }}" required>
                            <div class="invalid-feedback"> Имя обязательна к заполнению. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Фамилия</label>
                            <input type="text" class="form-control" id="lastName" required placeholder="" value="{{ $user['LastName'] }}">
                            <div class="invalid-feedback"> Фамилия обязательна к заполнению. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Телефон </label>
                        <input type="text" class="form-control" id="phone" required placeholder="+38(0xx)xxxxxxx" value="{{ $user['phone'] }}">
                        <div class="invalid-feedback"> Телефон обязателен к заполенению. </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="regions">Область</label>
                            <input list="region-list" class="form-control d-block w-100" id="regions" required onchange="getCities()" value="{{ $user['region'] }}">
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
                            <input list="city-list" class="form-control d-block w-100" id="cities" onclick="checkRegion()" required onchange="getMailDepartment()" autocomplete="my-field-name1" value="{{ $user['cities'] }}">

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
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="submitForm()">Сохранить</button>
                    <hr class="mb-4">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function(){

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

    function submitForm() {
        let form = $('#form_checkout')[0];

        if(form.checkValidity()){
            let firstName = $('#firstName').val();
            let lastName = $('#lastName').val();
            let phone = $('#phone').val();
            let regions = $('#regions').val();
            let cities = $('#cities').val();
            let department = $('#department').val();

            this.showLoading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
            });

            $.ajax({
                url: '/cabinet/changeUser',
                data: {
                    firstName:firstName,
                    lastName:lastName,
                    phone:phone,
                    regions:regions,
                    cities:cities,
                    department:department
                },
                method: 'post',
                success: function (data) {
                    if(data.result){
                        document.location.reload();
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
