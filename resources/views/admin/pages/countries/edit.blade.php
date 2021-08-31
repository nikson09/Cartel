@extends('admin.layouts.app', ['activePage' => 'countries', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Редактировать страну "{{ $country->name }}"</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_countries_edit_post', ['id' => $country->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <p>Изображение страны</p>
                                <div class="text-left">
                                    <img id="preview" src="{{ !empty($country->image) ? Storage::url('public/countries/'. $country->image)  : 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg' }}" style="max-width: 200px" class="rounded" alt="...">
                                </div>
                                <input class="form-control" type="file" id="files" style="display: none;cursor: pointer;" name="image" class="hidden"/>
                                <label for="files" style="cursor: pointer;">{{ $country->image }}</label>

                                <p>Название Страны</p>
                                <input required class="form-control" type="text" name="name" placeholder="Название страны" value="{{ $country->name }}">

                                <p>Название Страны для Google</p>
                                <input required class="form-control" type="text" name="site_name" placeholder="Название страны для Google" value="{{ $country->site_name }}">

                                <p>Активна ли страна?</p>
                                <select required class="custom-select" name="status">
                                    <option {{ $country->status === 1 ? 'selected' : '' }} value="1">Да</option>
                                    <option {{ $country->status === 0 ? 'selected' : '' }} value="0">Нет</option>
                                </select>
                                <div  style="justify-content: center;display: flex;">
                                    <button type="submit" class="btn btn-round btn-default">Редактировать страну</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('load', function() {
            document.querySelector('input[name="image"]').addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    let img = document.querySelector('#preview');
                    img.src = URL.createObjectURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
