@extends('admin.layouts.app', ['activePage' => 'categories', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Редактировать категорию "{{ $category->name }}"</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_categories_edit_post', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <p>Изображение категории</p>
                                <div class="text-left">
                                    <img id="preview" src="{{ !empty($country->image) ? Storage::url('public/categories/'. $country->image)  : 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg' }}" style="max-width: 200px" class="rounded" alt="...">
                                </div>
                                <input class="form-control" type="file" id="files" style="display: none;cursor: pointer;" name="image" class="hidden"/>
                                <label for="files" style="cursor: pointer;">{{ !empty($country->image) ? $country->image : 'выберете изображение'  }}</label>

                                <p>Название категории</p>
                                <input required class="form-control" type="text" name="name" placeholder="Название Категории" value="{{ $category->name }}">

                                <p>Выбор родительской категории</p>
                                <select class="custom-select"  name="parent">
                                    <option value="" selected="selected">Нажмите чтобы выбрать</option>
                                    @foreach($categories as $categorySelect)
                                        <option {{ $categorySelect->id === $category->id ? 'selected' : '' }} value="{{ $categorySelect->id }}">{{ $categorySelect->name }}</option>
                                    @endforeach
                                </select>

                                <p>Порядок сортировки</p>
                                <input required class="form-control" type="number" min="1" name="sort_order" placeholder="{{ count($categories) + 1 }}" value="{{ $category->sort_order }}">

                                <p>Активна ли категори?</p>
                                <select required class="custom-select" name="status">
                                    <option {{ $category->status === 1 ? 'selected' : '' }} value="1">Да</option>
                                    <option {{ $category->status === 0 ? 'selected' : '' }} value="0">Нет</option>
                                </select>

                                <p>Категория с категориями с изображением?</p>
                                <select required class="custom-select" name="is_main">
                                    <option {{ $category->is_main === 1 ? 'selected' : '' }} value="1">Да</option>
                                    <option {{ $category->is_main === 0 ? 'selected' : '' }} value="0">Нет</option>
                                </select>
                                <div  style="justify-content: center;display: flex;">
                                    <button type="submit" class="btn btn-round btn-default">Редактировать категорию</button>
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
