@extends('admin.layouts.app', ['activePage' => 'orders', 'titlePage' => __('Table List')])

@section('content')
    <style>
        select#admin_status{
            color: black;
        }
        select#wholesaler_status{
            color: black;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Статусы</h4>
                            <p class="card-category"> Здесь вы можете редактировать пользователей сайта и их статусы</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible;">
                                <table class="table" id="usersTable" >
                                    <thead class=" text-primary">
                                    <th>
                                        Идентификатор
                                    </th>
                                    <th>
                                        Имя
                                    </th>
                                    <th>
                                        Фамилия
                                    </th>
                                    <th>
                                        Статус:Админ
                                    </th>
                                    <th>
                                        Статус:Оптовик
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
    <div class="modal" id="user_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Изменить статус пользователю по имени <span id="user_name"></span></h5>
                    <button type="button" class="close" onclick="$('#user_modal').hide()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус: Админ</label>
                        <select id="admin_status" class="form-control">
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Статус: Оптовик</label>
                        <select id="wholesaler_status" class="form-control">
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                    <input type="hidden" id="user_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="changeUserStatus()">Сохранить</button>
                    <button type="button" class="btn btn-secondary" onclick="$('#user_modal').hide()" >Отменить</button>
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

            fetchTableData();
        });

        async function showUserModal(id)
        {
            let result = await $.ajax({
                url: '/api/getUser',
                method: 'POST',
                data: {
                    "id": id
                },
                success: function (response) {
                    let user = response.user;
                    console.log(user);
                    $('#user_name').text(user.name);
                    $('#admin_status').val(user.is_admin);
                    $('#wholesaler_status').val(user.is_wholesaler);
                    $('#user_id').val(id);
                },
                error: function (xhr, status, error) {

                }
            });

            $('#user_modal').show();
        }

        async function changeUserStatus()
        {
            let id = $('#user_id').val();
            let is_admin = $('#admin_status').val();
            let is_wholesaler = $('#wholesaler_status').val();

            let result = await $.ajax({
                url: '/api/changeUserStatus',
                method: 'POST',
                data: {
                    "id": id,
                    'is_admin': is_admin,
                    'is_wholesaler' : is_wholesaler
                },
                success: function (response) {

                    alert('Вы успешно изменили статус');
                },
                error: function (xhr, status, error) {

                }
            });

            $('#user_modal').hide();
            $('#usersTable').DataTable().ajax.reload()
        }

        function fetchTableData()
        {
            $('#usersTable').DataTable({
                "language": {
                    "search":  'Поиск',
                    "processing": 'Загрузка......',
                    "sInfo": 'Показано _START_ по _END_ с _TOTAL_ записей',
                    "infoEmpty": 'Показано с 0 по 0 из 0 записей',
                    "lengthMenu": 'Показать _MENU_ Записей',
                    "paginate": {
                        "first":      "Первая",
                        "last":       "Последняя",
                        "next":       "Следующая",
                        "previous":   "Предыдущая"
                    },
                    "zeroRecords": 'Пусто'
                },
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'/admin/users/get'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'LastName' },
                    { data: 'is_admin' },
                    { data: 'is_wholesaler' },
                    { data: 'action' },
                ]
            });
        }
    </script>
@endsection
