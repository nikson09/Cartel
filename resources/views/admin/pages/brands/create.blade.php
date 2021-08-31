@extends('admin.layouts.app', ['activePage' => 'brands', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Создать бренд</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_brands_create_post') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <p>Изображение товара</p>
                                <div class="text-left">
                                    <img id="preview" src="https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg" style="max-width: 200px" class="rounded" alt="...">
                                </div>
                                <input class="form-control" type="file" name="image">

                                <p>Название бренд</p>
                                <input required class="form-control" type="text" name="name" placeholder="Название Бренда">

                                <p>Название бренда для Google</p>
                                <input required class="form-control" type="text" name="site_name" placeholder="Название Бренда для Google">

                                <p>Активен ли бренд?</p>
                                <select required class="custom-select" name="status">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select>

                                <div  style="justify-content: center;display: flex;">
                                    <button type="submit" class="btn btn-round btn-default">Создать бренд</button>
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
