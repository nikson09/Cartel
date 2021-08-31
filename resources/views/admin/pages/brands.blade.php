@extends('admin.layouts.app', ['activePage' => 'brands', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Бренды</h4>
                            <p class="card-category"> Здесь вы можете редактировать бренды и добавлять их</p>
                            <a href="{{ route('admin_brands_create') }}" class="btn btn-round btn-default">Создать бренд</a>
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
                                        Название бренда
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
                    'url':'/admin/brands/get'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'image' },
                    { data: 'name' },
                    { data: 'action' }
                ]
            });
        });
    </script>
@endsection
