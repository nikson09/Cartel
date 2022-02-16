@extends('admin.layouts.app', ['activePage' => 'orders', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="height: 100%;color: white;padding: 1vw;">
                    <div class="row" style="margin-left: -10px;">
                        <div class="col-md-6">
                            <div class="panel panel-default" style="margin-top: 10px;">
                                <div class="panel-heading" style="margin-top: 0px;">
                                    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Заказ</h3>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td style="width: 1%;"><button data-toggle="tooltip" title="Магазин" class="btn btn-info btn-xs"><i class="fa fa-shopping-cart fa-fw"></i></button></td>
                                        <td><a href="/" target="_blank">Картель</a></td>
                                    </tr>
                                    <tr>
                                        <td><button data-toggle="tooltip" title="Дата добавления" class="btn btn-info btn-xs"><i class="fa fa-calendar fa-fw"></i></button></td>
                                        <td>{{ date( 'd.m.y H:i', strtotime($order['created_at'])) }}</td>
                                    </tr>
                                    <tr>
                                        <td><button data-toggle="tooltip" title="Способ оплаты" class="btn btn-info btn-xs"><i class="fa fa-credit-card fa-fw"></i></button></td>
                                        <td>Отсутсвует</td>
                                    </tr>
                                    <tr>
                                        <td><button data-toggle="tooltip" title="Статус" class="btn btn-info btn-xs"><i class="fa fa-truck fa-fw"></i></button></td>
                                        <td>
                                            <select id="select" onchange="changeStatus({{ $order['id'] }})" class="custom-select" aria-label="Измените статус">
                                                @foreach($statuses as $key => $status)
                                                    <option {{ $order['status'] == $key ? 'selected' : ''}} value="{{ $key }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default" style="margin-top: 10px;">
                                <div class="panel-heading" style="margin-top: 0px;">
                                    <h3 class="panel-title"><i class="fa fa-user"></i> Клиент</h3>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td style="width: 1%;"><button data-toggle="tooltip" title="Клиент" class="btn btn-info btn-xs"><i class="fa fa-user fa-fw"></i></button></td>
                                        <td>@if(!empty($order['user']['name'])) {{$order['user']['name']}} @else N/A @endif </td>
                                    </tr>
                                    <tr>
                                        <td><button data-toggle="tooltip" title="Телефон" class="btn btn-info btn-xs"><i class="fa fa-phone fa-fw"></i></button></td>
                                        <td>
                                            @if(!empty($order['user']['phone']))
                                                {{$order['user']['phone']}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-info-circle"></i> Детали заказа № {{$order['id']}}</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td style="width: 50%;" class="text-left">Адрес плательщика</td>
                                        <td style="width: 50%;" class="text-left">Адрес доставки</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">
                                            {{$order['user']['name']}} {{ $order['user']['LastName']}}
                                            <br/>
                                            {{ $order['user']['department']}}
                                            <br/>
                                            {{ $order['user']['cities'] }}
                                            <br/>
                                            {{ $order['user']['region'] }}
                                        </td>
                                        <td class="text-left">
                                            {{ $order['user']['name']}} {{ $order['user']['LastName']}}
                                            <br/>
                                            {{ $order['user']['department'] }}
                                            <br/>
                                            {{ $order['user']['cities'] }}
                                            <br/>
                                            {{ $order['user']['region'] }}
                                            <br/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-left">Товар</td>
                                        <td class="text-left">Изображение товара</td>
                                        <td class="text-left">Модель</td>
                                        <td class="text-right">Цена за одну единицу</td>
                                        <td class="text-right">Количество</td>
                                        <td class="text-right">Итого</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($order['products'] as $product_key => $product)
                                    <tr>
                                        <td class="text-left">
                                            @if (!empty($product))
                                                <a href="">{{ $product['productAttributes']['id'] }}</a>
                                            @else
                                                Товар был удален
                                            @endif
                                        </td>
                                        <td>
                                            <img id="preview" style="max-width: 2vw;" src="{{  Storage::url('public/products/'. $product['productAttributes']['image']) }}" style="max-width: 200px" class="rounded" alt="...">
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($product))
                                                <a href="">{{ $product['productAttributes']['name'] }} {{ $product['isPreOrder'] ? '(По Предзаказу)' : ''}}</a>
                                            @else
                                                Товар был удален
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            {{$product['sum']}} грн
                                        </td>
                                        <td class="text-right">
                                            {{ $product['quantity'] }}
                                        </td>
                                        <td class="text-right">
                                            {{$product['sum'] * $product['quantity']}} грн
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="5" class="text-right">Всего к оплате</td>
                                        <td class="text-right">{{ $order['sum'] }} грн</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function changeStatus(id)
        {
            let status = $('#select').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/orders/changeOrderStatus',
                method: 'POST',
                data: {
                    'id': id,
                    'status': status
                },
                success: function (response) {

                    alert('Вы успешно изменили статус');
                },
                error: function (xhr, status, error) {

                }
            });
        }
    </script>
@endsection
@section('styles')
    <style>
        .card {
            background: #27293d;
            border: 0;
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            box-shadow: 0 1px 20px 0px rgba(0, 0, 0, 0.1);
            color: white;
            padding: 1vw;
        }
    </style>
@endsection
