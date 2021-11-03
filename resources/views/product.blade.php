@extends('layouts.app')
@extends('layouts.sectionCategory')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
            <div class="product-details"><!--product-details-->
                <div class="row">
                    <div class="col-5">
                        <div class="view-product">
                            <div class="w_image_w img-thumbnail">
                                @if ($product['is_sales'])
                                    <span class="discount_date_w">
                                                до {{ $product['discount_date'] }}</span>
                                @endif

                                <div class="row justify-content-center">
                                    <img alt="{{$product['name']}}" class="img_w" src="{{ Storage::url('public/products/'. $product['image'])}}" width="auto" height="270" alt="" />
                                    @if ($product['is_sales'])
                                        <span class="product__discount">-{{$product['discount_percent']}}%</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">

                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="product-information"><!--/product-information-->
                            @if ($product['is_new'])
                                <img src="/images/new.jpg" class="newarrival" alt=""/>
                            @endif
                            <h2>{{$product['name']}}</h2>

                            <p class="text-left">
                                <b class="item_info_p">Страна Производитель:</b>
                                <a class='link' href="/country/{{$product['country']['id']}}/category/{{ $category['id'] }}">
                                    <img class='image_flag_m ' src='{{ Storage::url('public/countries/'. $product['country']['image']) }}' alt=''/>
                                </a>
                            </p>

                            <p class="text-left">
                                <b class="item_info_p text-left">Бренд:</b>
                                <a href="/brand/{{$product['brand']['id']}}/category/{{ $category['id'] }}">
                                    {{$product['brand']['name']}}
                                </a>
                            </p>

                            <div class="But_add">
                                <span>
                                    <div class="row justify-content-center">
                                        @if ($product['is_sales'])
                                            <div class="g-price-old-uah_w">
                                                {{$product['discount_sum']}}<span class="g-price-old-uah-sign"> грн</span>
                                            </div>
                                        @endif
                                        <span class="price">{{$product['sum']}}</span>
                                        <span  class="price">грн</span>
                                    </div>
                                    <div class="row justify-content-center">
                                        <span class="count">Кол-во:
                                            <button class="down btn btn-default checkout">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="text" class="quantity" id="quantity" value="1" data-min-value="1" data-max-value="10000" min="1"  pattern="[0-9]*"/>
                                            <button class="up btn btn-default checkout" >
                                                    <i class="fa fa-plus"></i>
                                            </button>
                                            <a href="#" class="btn btn-default add-to-cart" data-quantity="1"  data-id="{{$product['id']}}" ><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </span>
                                    </div>
                                </span>
                            </div>
                        </div><!--/product-information-->
                    </div>
                </div>

                <br>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-home" aria-selected="true">Описание</a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-attributes" role="tab" aria-controls="nav-profile" aria-selected="false">Характеристики</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active text-center" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                        <p class="text-body text-sm-center">{{$product['description']}}</p>
                    </div>
                    <div class="tab-pane fade" id="nav-attributes" role="tabpanel" aria-labelledby="nav-attributes-tab">
                        @foreach($product['attributes'] as $attribute)
                            <h5 class="text-left">
                                <b class="item_info_p">{{ $attribute['attribute']['name'] }}: </b>{{ $attribute['value'] }}
                            </h5>
                        @endforeach
                    </div>
                </div>

                @if(!empty($recomendedProducts))
                <div class="Description">
                    <div class="row">
                        <div class="col-12">
                            <div class="recommended_items"><!--recommended_items-->
                                <h5 class="title text-center">Рекомендуемые товары</h5>
                                <div class="cycle-slideshow"
                                     data-cycle-fx=carousel
                                     data-cycle-timeout=5000
                                     data-cycle-carousel-visible=3
                                     data-cycle-carousel-fluid=true
                                     data-cycle-slides="div.item"
                                     data-cycle-prev="#prev"
                                     data-cycle-next="#next"
                                >
                                    <div class="row justify-content-center ">
                                        @foreach ($recomendedProducts as $sliderItem)
                                        <div class="item">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <div class="row justify-content-center ">
                                                            <a href="/product/{{ $sliderItem['id'] }}">
                                                            <img src="{{ Storage::url('public/products/'. $product['image'])}}" width="auto" height="107,783" alt=""/></a>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                        </div>
                                                        <a class="main-goods__title" style="white-space: normal;" href="/product/{{ $sliderItem['id'] }}">
                                                            {{ $sliderItem['name'] }}
                                                        </a>
                                                        <h4>{{ $sliderItem['sum'] }} грн</h4>
                                                    </div>
                                                    @if ($sliderItem['is_new'])
                                                        <img  src="/images/new.png" class="new_1" alt="" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

    </script>
@endsection
@section('style')
<style>
    .But_add {
        height: 10vw;
        justify-content: center;
        padding: 1vw;
    }
    .product-details{
        padding-bottom: 2vw;
    }
    div#nav-attributes {
        padding: 1vw;
    }
    div#nav-description {
        padding: 1vw;
    }
    .discount_date_w {
        position: absolute;
        content: "";
        width: 8vw;
        height: 1.3vw;
        background-color: #C7A87A;
        border-radius: 8px;
        color: #fff;
        font-size: 1vw;
        line-height: 1.4vw;
        text-align: center;
        font-family: Trebuchet MS Bold, Arial, sans-serif;
        left: 7vw;
    }
</style>
@endsection
