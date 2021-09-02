@extends('admin.layouts.app', ['activePage' => 'bar-menu', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Бар Меню</h4>
                            <p class="card-category"> Здесь вы можете редактировать пункты меню и добавлять их</p>
                            <a href="{{ route('admin_barMenus_create') }}" class="btn btn-round btn-default">Создать пункт меню</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible;">
                                <table class="table" id="brandsTable" >
                                    <thead class=" text-primary">
                                    <th>
                                        Идентификатор
                                    </th>
                                    <th>
                                        Изображение
                                    </th>
                                    <th>
                                        Название пункта
                                    </th>
                                    <th>
                                        Ссылка
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
            $('#brandsTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'/admin/bar_menus/get'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'image' },
                    { data: 'name' },
                    { data: 'href' },
                    { data: 'action' }
                ]
            });
        });
    </script>
@endsection
