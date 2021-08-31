@extends('admin.layouts.app', ['activePage' => 'products', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Товары</h4>
                            <p class="card-category"> Здесь вы можете редактировать товары и добавлять товары</p>
                            <a href="{{ route('admin_product_create') }}" class="btn btn-round btn-default">Создать продукт</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible;">
                                <table class="table" id="productsTable" >
                                    <thead class=" text-primary">
                                    <th>
                                        Изображение
                                    </th>
                                    <th>
                                        Идентификатор

                                    </th>
                                    <th>
                                        Название продукта
                                    </th>
                                    <th>
                                        Цена
                                    </th>
                                    <th>
                                        Действие
                                    </th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#productsTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'/admin/product/get'
                },
                'columns': [
                    { data: 'image' },
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'price' },
                    { data: 'action' },
                ]
            });
        });
    </script>
@endsection
