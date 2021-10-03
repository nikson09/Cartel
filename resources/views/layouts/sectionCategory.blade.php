@section('content_right')
    <div class="col-sm-3">
        <div class="left-sidebar">
            <div class="new-sleva">
            </div>
            @if(!empty($podCategories) && count($podCategories) > 0)
                <h4>Подкатегории</h4>
                <div class="panel-group category-products">
                    @foreach ($podCategories as $categoryItem)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a href="/category/{{ $categoryItem->id }}">
                                        {{ $categoryItem['name'] }}</a>
                                </h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(!empty($productBrands))
                <h4>Бренды</h4>
                <div class="panel-group category-products">
                    @foreach ($productBrands as $categoryItem)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a href="/brand/{{ $categoryItem['id'] }}/category/{{ $category->id }}">
                                        {{ $categoryItem['name'] }}</a>
                                </h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(!empty($productCountries))
                <h4>Страны</h4>
                <div class="panel-group category-products">
                    @foreach ($productCountries as $categoryItem)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a href="/country/{{ $categoryItem['id'] }}/category/{{ $category->id }}">
                                        {{ $categoryItem['name'] }}</a>
                                </h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div><!--Категории-->
@endsection
