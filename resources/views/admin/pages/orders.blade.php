@extends('admin.layouts.app', ['activePage' => 'orders', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Заказы</h4>
                            <p class="card-category"> Здесь вы можете редактировать заказы и просматривать товары с заказов</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible;">
                                <table class="table" id="ordersTable" >
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
                                        Сума
                                    </th>
                                    <th>
                                        Количество товаров
                                    </th>
                                    <th>
                                        Статус
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
    <div class="modal" id="discount_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить скидку на <span id="product_name"></span></h5>
                    <button type="button" class="close" onclick="$('#discount_modal').hide()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Процент скидки</label>
                        <input required style="color: black;" onkeypress="changeSum" type="number" class="form-control" id="discount_percent" placeholder="Введите процент скидки на продукте" min="0" max="100" value="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Дата окончания скидки</label>
                        <input required style="color: black;" type="date" class="form-control" id="discount_date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Итоговая сумма с учетом скидки</label>
                        <input style="color: white;" type="text" disabled class="form-control" id="discount_sum_show">
                    </div>
                    <input type="hidden" id="discount_sum">
                    <input type="hidden" id="product_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="addDiscount()">Сохранить</button>
                    <button type="button" class="btn btn-secondary" onclick="$('#discount_modal').hide()" >Отменить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="discount_delete_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Удалить скидку на <span id="product_delete_name"></span> ?</h5>
                    <button type="button" class="close" onclick="$('#discount_delete_modal').hide()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы уверены что хотите удалить скидку?</p>
                    <input type="hidden" id="product_delete_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="deleteDiscount()">Да</button>
                    <button type="button" class="btn btn-secondary" onclick="$('#discount_delete_modal').hide()" >Отменить</button>
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

            $('#discount_percent').on('input', function() {
                changeSum();
            });
        });

        async function showDiscountModal(id)
        {
            let result = await $.ajax({
                url: '/api/getProduct',
                method: 'POST',
                data: {
                    "id": id
                },
                success: function (response) {
                    let product = response.product;

                    $('#product_name').text(product.name);
                    $('#discount_sum').val(product.sum);
                    $('#product_id').val(id);
                },
                error: function (xhr, status, error) {

                }
            });

            $('#discount_modal').show();
        }


        function changeSum() {
            let procent = $('#discount_percent').val();
            let sum = $('#discount_sum').val();

            if(procent > 0){
                sum = sum - (sum / 100 * procent);

                $('#discount_sum_show').val(Math.ceil(sum));
            }
        }

        async function addDiscount()
        {
            let id = $('#product_id').val();
            let percent = $('#discount_percent').val();
            let date = $('#discount_date').val();

            let result = await $.ajax({
                url: '/api/addDiscountPercent',
                method: 'POST',
                data: {
                    "id": id,
                    'percent': percent,
                    'date' : date
                },
                success: function (response) {

                    alert('Вы успешно добавили скидку');
                },
                error: function (xhr, status, error) {

                }
            });

            $('#discount_modal').hide();
            $('#productsTable').DataTable().ajax.reload()
        }

        async function deleteDiscountModal(id)
        {
            let result = await $.ajax({
                url: '/api/getProduct',
                method: 'POST',
                data: {
                    "id": id
                },
                success: function (response) {
                    let product = response.product;

                    $('#product_delete_name').text(product.name);
                    $('#product_delete_id').val(id);
                },
                error: function (xhr, status, error) {

                }
            });

            $('#discount_delete_modal').show();
        }

        async function deleteDiscount()
        {
            let id = $('#product_delete_id').val();

            let result = await $.ajax({
                url: '/api/deleteDiscountPercent',
                method: 'POST',
                data: {
                    "id": id
                },
                success: function (response) {

                    alert('Вы успешно удалили скидку');
                },
                error: function (xhr, status, error) {

                }
            });

            $('#discount_delete_modal').hide();
            $('#productsTable').DataTable().ajax.reload()
        }

        function fetchTableData()
        {
            $('#ordersTable').DataTable({
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
                    'url':'/admin/orders/get'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'first_name' },
                    { data: 'last_name' },
                    { data: 'price' },
                    { data: 'quantity' },
                    { data: 'status' },
                    { data: 'action' },
                ]
            });
        }
    </script>
@endsection
