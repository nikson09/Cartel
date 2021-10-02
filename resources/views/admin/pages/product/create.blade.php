@extends('admin.layouts.app', ['activePage' => 'products', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Создать товар</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_product_create_post') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <p>Изображение товара</p>
                                <div class="text-left">
                                    <img id="preview" src="https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg" style="max-width: 200px" class="rounded" alt="...">
                                </div>
                                <input class="form-control" type="file" name="image">

                                <p>Название товара</p>
                                <input required class="form-control" type="text" name="name" placeholder="Название Товара">

                                <p>Количество товара</p>
                                <input required class="form-control" type="number" name="quantity" min="0" placeholder="0">

                                <p>Выбор категории</p>
                                <select required class="custom-select"  name="category_id">
                                    <option value="" selected="selected">Нажмите чтобы выбрать</option>
                                    @foreach($categories as $categorySelect)
                                        <option value="{{ $categorySelect->id }}">{{ $categorySelect->name }}</option>
                                    @endforeach
                                </select>

                                <p>Выбор странны</p>
                                <select class="custom-select"  name="country_id">
                                    <option value="" selected="selected">Нажмите чтобы выбрать</option>
                                    @foreach($countries as $countrySelect)
                                        <option value="{{ $countrySelect->id }}">{{ $countrySelect->name }}</option>
                                    @endforeach
                                </select>

                                <p>Выбор бренда</p>
                                <select class="custom-select"  name="brand_id">
                                    <option value="" selected="selected">Нажмите чтобы выбрать</option>
                                    @foreach($brands as $brandSelect)
                                        <option value="{{ $brandSelect->id }}">{{ $brandSelect->name }}</option>
                                    @endforeach
                                </select>

                                <p>Цена товара</p>
                                <input required class="form-control" type="number" name="price" placeholder="0">

                                @foreach($attributes as $attribute)
                                    <p>{{ $attribute->name }}</p>
                                    <input required class="form-control" type="text" name="attributes[{{ $attribute->id }}]" placeholder="{{ $attribute->name }}">
                                @endforeach


                                <p>Описание</p>
                                <textarea required class="form-control" name="description"></textarea>

                                <p>Новый ли товар?</p>
                                <select class="custom-select"  name="is_new">
                                    <option value="1">Да</option>
                                    <option value="0" selected="selected">Нет</option>
                                </select>

                                <p>Рекомендовать товар?</p>
                                <select class="custom-select"  name="is_recomended">
                                    <option value="1">Да</option>
                                    <option value="0" selected="selected">Нет</option>
                                </select>


                                <div style="justify-content: center;display: flex;">
                                    <button type="submit" class="btn btn-round btn-default">Создать товар</button>
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
