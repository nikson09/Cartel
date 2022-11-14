@extends('layouts.app')
@extends('layouts.cabinet')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card text-center" style="border:none">
                <div class="card-body">
                    <h4 class="title text-center">Ваши заказы</h4>

                    <div class="table-responsive" style="overflow: visible;">
                        <table class="table" id="ordersTable" >
                            <thead class="text-primary">
                                <th>
                                    № Заказа
                                </th>
                                <th>
                                    Статус Заказа
                                </th>
                                <th>
                                    Стоимость
                                </th>
                                <th>
                                    Подробнее
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

    <div class="modal fade" id="cartModalInOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Подробности Заказа
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="basket-modal-body">
                        <div class="d-flex justify-content-end" style="margin-bottom: 1vw;">
                        </div>
                        <table class="table table-image">
                            <thead>
                            <tr>
                                <th scope="col">Изображение</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Количество</th>
                                <th scope="col">Всего</th>
                            </tr>
                            </thead>
                            <tbody id="cart-body">

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <h5>Всего: <span class="price text-primary"><span id="total_cart_sum">0</span> грн</span></h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content-mobile')
    <div class="container">
        <div class="row justify-content-center">
                <div class="card text-center" style="border:none;margin-left: -6vw;">
                    <div class="card-body">
                        <h4 class="title text-center">Ваши заказы</h4>

                        <div class="table-responsive" style="overflow: visible;">
                            <table class="table" id="ordersTable" >
                                <thead class="text-primary">
                                <th>
                                    № Заказа
                                </th>
                                <th>
                                    Статус Заказа
                                </th>
                                <th>
                                    Стоимость
                                </th>
                                <th>
                                    Подробнее
                                </th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

{{--        <div class="modal fade" id="cartModalInOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header border-bottom-0">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel">--}}
{{--                            Подробности Заказа--}}
{{--                        </h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <div id="basket-modal-body">--}}
{{--                            <div class="d-flex justify-content-end" style="margin-bottom: 1vw;">--}}
{{--                            </div>--}}
{{--                            <table class="table table-image">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">Изображение</th>--}}
{{--                                    <th scope="col">Наименование</th>--}}
{{--                                    <th scope="col">Цена</th>--}}
{{--                                    <th scope="col">Количество</th>--}}
{{--                                    <th scope="col">Всего</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody id="cart-body">--}}

{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <div class="d-flex justify-content-end">--}}
{{--                                <h5>Всего: <span class="price text-primary"><span id="total_cart_sum">0</span> грн</span></h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer border-top-0 d-flex justify-content-between">--}}
{{--                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Закрыть</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
                    'url':'/cabinet/orders/get'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'status' },
                    { data: 'sum' },
                    { data: 'advanced' }
                ]
            });
        });

        function getOrderDetail(id)
        {

            this.showLoading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
            });

            $.ajax({
                url: '/cabinet/fetchBasketProductsForOrders/' + id,
                data: {},
                method: 'post',
                success: function(data){
                    $("#loader").hide();
                    let products = data.products;
                    let notRelatedProducts = data.notRelatedProducts;
                    if(data.sum <= 0){
                        $('#basket-modal-body').hide();
                        $('#checkout_button').hide();
                        $('#cart-is-empty').show();
                    } else {
                        let html = drawPageOrder(products);
                        html = html + drawPageOrder(notRelatedProducts);
                        $('#cart-body').html(html);
                        $('#total_cart_sum').text(data.sum);

                        $('#basket-modal-body').show();
                    }
                    $('#cartModalInOrder').modal('show');
                },
                error: function(error){
                    console.log(error);
                    $("#loader").hide();
                },
            });
        }
</script>
@endsection
