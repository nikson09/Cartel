@extends('admin.layouts.app', ['activePage' => 'product_attributes', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Редактировать Атрибут</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_product_attributes_edit_post', ['id' => $attribute->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <p>Название атрибута</p>
                                <input required class="form-control" type="text" name="name" placeholder="Название Атрибута" value="{{ $attribute->name }}">

                                <p>Активный ли атрибут?</p>
                                <select class="custom-select" name="active">
                                    <option>Нажмите чтобы выбрать</option>
                                    <option {{ $attribute->active === 1 ? 'selected' : ''  }} value="1">Да</option>
                                    <option {{ $attribute->active === 0 ? 'selected' : ''  }} value="0">Нет</option>
                                </select>
                                <div  style="justify-content: center;display: flex;">
                                    <button type="submit" class="btn btn-round btn-default">Редактировать атрибут</button>
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

@endsection
