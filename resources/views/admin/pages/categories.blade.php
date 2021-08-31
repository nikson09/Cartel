@extends('admin.layouts.app', ['activePage' => 'categories', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Категории</h4>
                            <p class="card-category"> Здесь вы можете редактировать категории и добавлять их</p>
                            <a href="{{ route('admin_categories_create') }}" class="btn btn-round btn-default">Создать категорию</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible;">
                                <table class="table" id="categoriesTable" >
                                    <thead class=" text-primary">
                                    <th>
                                        Идентификатор
                                    </th>
                                    <th>
                                        Название категории
                                    </th>
                                    <th>
                                        Название главной категории
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
            $('#categoriesTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'/admin/categories/get'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'parent' },
                    { data: 'action' }
                ]
            });
        });
    </script>
@endsection
