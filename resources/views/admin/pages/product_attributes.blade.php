@extends('admin.layouts.app', ['activePage' => 'product_attributes', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Аттрибуты Товаров</h4>
                            <p class="card-category"> Здесь вы можете редактировать атрибуты товаров и добавлять их</p>
                            <a href="{{ route('admin_product_attributes_create') }}" class="btn btn-round btn-default">Создать аттрибут</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible;">
                                <table class="table" id="productsAttributeTable" >
                                    <thead class=" text-primary">
                                    <th>
                                        Идентификатор

                                    </th>
                                    <th>
                                        Название аттрибута
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
            $('#productsAttributeTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'/admin/product_attribute/get'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'action' }
                ]
            });
        });
    </script>
@endsection
