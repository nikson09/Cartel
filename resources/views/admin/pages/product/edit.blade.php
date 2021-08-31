@extends('admin.layouts.app', ['activePage' => 'products', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Редактировать товар "{{ $product->name }}"</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_product_edit_post', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <p>Изображение товара</p>
                                <div class="text-left">
                                    <img id="preview" src="{{ !empty($product->image) ? Storage::url('public/products/'. $product->image)  : 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg' }}" style="max-width: 200px" class="rounded" alt="...">
                                </div>
                                <input class="form-control" type="file" id="files" style="display: none;cursor: pointer;" name="image" class="hidden"/>
                                <label for="files" style="cursor: pointer;">{{ $product->image }}</label>

                                <p>Название товара</p>
                                <input required class="form-control" type="text" name="name" placeholder="Название Товара" value="{{ $product->name }}">

                                <p>Количество товара</p>
                                <input required class="form-control" type="number" name="quantity" min="0" placeholder="0" value="{{ $product->quantity }}">

                                <p>Выбор категории</p>
                                <select class="custom-select"  name="category_id">
                                    <option value="" selected="selected">Нажмите чтобы выбрать</option>
                                    @foreach($categories as $categorySelect)
                                        <option {{ $categorySelect->id === $product->category_id ? 'selected' : '' }} value="{{ $categorySelect->id }}">{{ $categorySelect->name }}</option>
                                    @endforeach
                                </select>

                                <p>Выбор странны</p>
                                <select class="custom-select"  name="country_id">
                                    <option value="" selected="selected">Нажмите чтобы выбрать</option>
                                    @foreach($countries as $countrySelect)
                                        <option {{ $countrySelect->id === $product->country_id ? 'selected' : '' }} value="{{ $countrySelect->id }}">{{ $countrySelect->name }}</option>
                                    @endforeach
                                </select>

                                <p>Выбор бренда</p>
                                <select class="custom-select"  name="brand_id">
                                    <option value="" selected="selected">Нажмите чтобы выбрать</option>
                                    @foreach($brands as $brandSelect)
                                        <option {{ $brandSelect->id === $product->brand_id ? 'selected' : '' }} value="{{ $brandSelect->id }}">{{ $brandSelect->name }}</option>
                                    @endforeach
                                </select>

                                <p>Цена товара</p>
                                <input required class="form-control" type="number" name="price" placeholder="0" value="{{ $product->sum }}">

                                @foreach($attributes as $attribute)
                                    <p>{{ $attribute->name }}</p>
                                    @if(!empty($product->attributes) && count($product->attributes) > 0)
                                        @foreach($product->attributes as $productAttribute)
                                            @if($productAttribute->attribute_id == $attribute->id)
                                                <input required class="form-control" type="text" name="attributes[{{ $attribute->id }}]" placeholder="{{ $attribute->name }}" value="{{ $productAttribute->value }}">
                                            @endif
                                        @endforeach
                                    @else
                                        <input required class="form-control" type="text" name="attributes[{{ $attribute->id }}]" placeholder="{{ $attribute->name }}">
                                    @endif
                                @endforeach

                                <p>Описание</p>
                                <textarea required class="form-control" name="description" >{{ $product->description }}</textarea>

                                <p>Новый ли товар?</p>
                                <select class="custom-select"  name="is_new">
                                    <option {{ $product->is_new === 1 ? 'selected' : '' }} value="1">Да</option>
                                    <option {{ $product->is_new === 0 ? 'selected' : '' }} value="0">Нет</option>
                                </select>


                                <div  style="justify-content: center;display: flex;">
                                    <button type="submit" class="btn btn-round btn-default">Редактировать товар</button>
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
