@extends('layouts.app')
@extends('layouts.baner')
@extends('layouts.sectionCategory')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @if(!$category->is_main)
                <div class="features_items">
                    <h3 class="title text-center">{{ $category->name }}</h3>
                        <div class="row justify-content-center ">
                            @foreach ($products as $product)
                                <div class="col-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                @if ($product['is_sales'])
                                                    <span class="discount_date">
                                                        до {{ $product['discount_date'] }}</span>
                                                @endif
                                                @if (!$product['is_sales'])
                                                    <span class="discount_none"></span>
                                                @endif
                                                @if ($product['quantity'] > 0)
                                                    <img src="/images/templates/in_stock.png" class="quantity_product" alt="" />
                                                @else
                                                    <img src="/images/templates/under_the_order.png" class="quantity_product" alt="" />
                                                @endif
                                                <div class="row justify-content-center" style="height: 16vw;">
                                                    <a href="/product/{{ $product['id'] }}">
                                                        <img class="lazy" src="data:image/gif;base64,R0lGODlhyQDXAIAAAP///wAAACH5BAEAAAEALAAAAADJANcAAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8YTjRw7evwIMqTIkSRLmjyJMiWlAgA7" data-src="{{Storage::url('public/products/'. $product['image'])}}" width="auto" height="215,783" alt="" />
                                                    </a>
                                                </div>
                                                @if ($product['is_new'])
                                                    <img src="/images/new.png" class="new" alt="" />
                                                @endif
                                                @if ($product['is_sales'])
                                                    <span class="product__discount">-{{ $product['discount_percent'] }}%</span>
                                                @endif
                                                <div class="row justify-content-center">
                                                </div>
                                                <div class="Text_block">
                                                    <p>
                                                        <a class="main-goods__title" href="/product/{{ $product['id'] }}">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </p>
                                                    <span class="country">
                                                        @if (!empty($product['country']))
                                                            <img class='image_flag lazy' style="margin-right: 0.3vw;" src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='{{ Storage::url('public/countries/'. $product['country']['image']) }}' alt='' /><a class='link' href="/country/{{ $product['country']['id'] }}">{{$product['country']['site_name']}} / </a>
                                                        @endif
                                                        @if ($product['brand'])
                                                            <a href="/pod_categorys/{{ $product['brand']['id'] }}">{{$product['brand']['name']}}</a>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="But_add" style="width: 50%">
                                                    <div class="d-block">
                                                        @if ($product['is_sales'])
                                                            <div class="g-price-old-uah">
                                                                {{ $product['sum'] }}<span class="g-price-old-uah-sign"> грн</span>
                                                            </div>
                                                            <h5 class="pric">{{$product['discount_sum']}} грн</h5>
                                                        @else
                                                            <h5 class="pric">{{$product['sum']}} грн</h5>
                                                        @endif
                                                    </div>
                                                    <a href="javascript:void(0);" style="margin-top: 0.5vw;" onclick="addToBasketOneProduct({{ $product['id'] }})" class="btn btn-default add-to-cart" data-id="{{ $product['id'] }}"><i style="margin-right: 0.1vw;" class="fa fa-shopping-cart"></i>В корзину</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                {{$products->links() }}
            </div>
                @else
                    <div class="features_items"><!--features_items-->
                        <h3 class="title text-center">{{ $category->name }}</h3>
                        <div class="Wine_countrys">
                            <div class="row justify-content-center">
{{--                                @foreach($podCategories as $prodCat)--}}
{{--                                <div class="single-products" style="position: relative;margin-right: 5px;width: 200px;height: 123px;margin-top: 17px;margin-bottom: 39px;">--}}
{{--                                    <div class="productinfo text-center">--}}
{{--                                        <a href="/category/{{ $prodCat['id'] }}"> <img width="auto" height="215,783" src="{{Storage::url('public/categories/'. $prodCat['image'])}}" alt="" /></a>--}}
{{--                                        <p><a href="/category/{{ $prodCat['id'] }}">{{ $prodCat['name'] }}</a></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                <br>
                    @if(count($productBrands) > 0)
                        <div class="features_items"><!--features_items-->
                            <h5 class="title text-center">Бренды</h5>
                            <div class="Wine_countrys">
                                <div class="row justify-content-center">
                                    @foreach($productBrands as $prodCat)
                                    <div class="single-products" style="position: relative;margin-right: 5px;width: 200px;height: 123px;margin-top: 17px;margin-bottom: 39px;">
                                        <div class="productinfo text-center">
                                            <a href="/brand/{{ $prodCat['id'] }}/category/{{ $category->id }}"> <img width="auto" height="215,783" src="{{Storage::url('public/brands/'. $prodCat['image'])}}" alt="" /></a>
                                            <p><a href="/brand/{{ $prodCat['id'] }}/category/{{ $category->id }}">{{ $prodCat['name'] }}</a></p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($podCategories) > 0)
                        <br>
                        <div class="features_items"><!--features_items-->
                            <h5 class="title text-center">Подкатегории</h5>
                            <div class="Wine_countrys">
                                <div class="row justify-content-center">
                                    @foreach($podCategories as $prodCat)
                                        <div class="single-products" style="position: relative;margin-right: 5px;width: 200px;height: 123px;margin-top: 17px;margin-bottom: 39px;">
                                            <div class="productinfo text-center">
                                                <a href="/category/{{ $prodCat['id'] }}"> <img width="auto" height="215,783" src="{{Storage::url('public/categories/'. $prodCat['image'])}}" alt="" /></a>
                                                <p><a href="/category/{{ $prodCat['id'] }}">{{ $prodCat['name'] }}</a></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            console.log("Саша , я тебя люблю, ты выйдешь за меня?");
        });
    </script>
@endsection
