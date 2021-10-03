@section('content_right')
<div class="col-sm-3">
    <div class="left-sidebar">
        <div class="new-sleva">
{{--                    <?php foreach ($categories_2 as $categoryItem): ?>--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h6 class="panel-title"><a href="/sub_categorys/<?php echo $categoryItem['id'];?>">--}}
{{--                                    <?php echo $categoryItem['name'];?></a>--}}
{{--                            </h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <?php endforeach; ?>--}}
        </div>
        <h4 id="categor_name">Категории</h4>
        <div class="panel-group category-products">
            @foreach ($categories as $categoryItem)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a href="/category/{{ $categoryItem['id'] }}">
                                {{ $categoryItem['name'] }}</a>
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div><!--Категории-->
@endsection
