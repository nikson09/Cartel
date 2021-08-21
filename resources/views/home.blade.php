@extends('layouts.app')
@extends('layouts.section')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center" style="border:none">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы Авторизованы
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
