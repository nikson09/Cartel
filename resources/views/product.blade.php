

<div  class="product-details"><!--product-details-->
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="view-product"><div class="w_image_w img-thumbnail">
                    @if ($product['discount'])
                        <span class="discount_date_w">{{$product['discount_date']}}</span>
                    @endif
                    <div class="container">
                        <div class="row justify-content-center">
                            <img alt="{{$product['name_site']}}"  class="img_w" src="{{Product::getImage($product['id'])}}" width="auto" height="270" alt="" />
                            @if ($product['discount'])
                                <span class="product__discount">-{{$product['discount_num']}}>%</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="product-information"><!--/product-information-->
                @if ($product['is_new'])
                    <img  src="/Templates/images//new.jpg" class="newarrival" alt="" />
                @endif
                <h2>{{$product['name_site']}}</h2>
                <p class=" voted text-left">Код товара:{{$product['code']}}</p>
                <div class="But_add">
                    <span>
                        <div class="row justify-content-center">
                            @if ($product['discount'])
                                <div class="g-price-old-uah_w">
                                    {{$product['last_price']}}<span class="g-price-old-uah-sign"> грн</span>
                                </div>
                            @endif
                            <span class="price">{{$product['price']}}</span>
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
                <br>
                <h5 class="text-sm-center">Характеристики товара:</h5>
                @if($product['category_id'] !== '17' && $product['category_id'] !== '18')
                    <p class="text-left"><b class="item_info_p">Обьем:</b>{{$product['size']}}л</p>
                @else
                    <p class="text-left"><b class="item_info_p">Обьем:</b>{{$product['size']}}г</p>
                @endif;
                @if ($product['category_id'] == 4)
                    <p class="text-left"><b class="item_info_p">Цвет:</b>
                        @if($product['wine_color'] == 1)
                            <a  href='/sub_wine/1'>белое</a>"
                        @endif
                    </p>
                    <p class="text-left"><b class="item_info_p">Тип:</b>
                        @if($product['wine_class'] == 1)
                            екстра сухое
                        @endif
                    </p>
                    <p class="text-left"><b class="item_info_p">Страна Производитель:</b>
                        @if($product['wine_category_id'] == 17)
                            <img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>"
                        @endif
                    </p>
                @endif
                @if ($product['category_id'] == 13)
                    <p class="text-left"><b class="item_info_p">Цвет:</b>
                        @if($product['wine_color'] == 1)
                            <a href='/sub_wine/1'>белое</a>
                        @endif
                    </p>
                    <p class="text-left"><b class="item_info_p">Тип:</b>
                        @if($product['wine_class'] == 1)
                            екстра сухое
                        @endif
                    </p>
                    <p class="text-left"><b class="item_info_p">Страна Производитель:</b>
                        @if($product['wine_category_id'] == 17)
                            <img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>
                        @endif
                    </p>
                @endif

                @if ($product['parent'])
                    @foreach ($categories_pod_name as $pod_category)
                        <p class="text-left">
                            <b class="item_info_p text-left">Производитель:</b>
                            <a href="/pod_categorys/{{$pod_category['id']}}">
                                {{$pod_category['name']}}
                            </a>
                        </p>
                    @endforeach
                @endif
                @if($product['category_id'] !== '17' && $product['category_id'] !== '18')
                    <p class=" text-left"><b class="item_info_p">Крепость:</b>{{$product['strength']}}%</p>
                @endif
                @if ($product['country'])
                    @foreach ($countryList_name as $country)
                        <p class="text-left"><b class="item_info_p">Страна Производитель:</b>
                            <a class='link' href="/country/{{$country['id']}}"><img class='image_flag_m ' src='{{Category::getImage($country['id'])}}' alt='' /></a></p>
                    @endforeach
                @endif
            </div><!--/product-information-->
        </div>
    </div>

    <div class="Description">
        <div class="row">
            <div class="col-12">
                <h5 class="text-sm-center">Описание товара:</h5>
                <p class="text-body text-sm-center">{{$product['description']}}</p>
            </div>
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
                            @foreach ($sliderProducts as $sliderItem)
                            <div class="item">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="row justify-content-center ">
                                                <a href="/product/<?php echo $sliderItem['id'];?>">  <img  src="<?php echo Product::getImage($sliderItem['id']); ?>" width="auto" height="107,783" alt="" /></a>
                                            </div>
                                            <div class="row justify-content-center">
                                            </div>
                                            <a class="main-goods__title" style="white-space: normal;" href="/product/<?php echo $sliderItem['id']; ?>">
                                                <?php echo $sliderItem['name_site']; ?>
                                            </a>
                                            <h4><?php echo $sliderItem['price']; ?>грн</h4>


                                        </div>
                                        <?php if ($sliderItem['is_new']): ?>
                                        <img  src="/Templates/images/new.png" class="new_1" alt="" />
                                        <?php endif; ?>
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
</div>
</div>
</div>
</div>

</section>
<section id="section_mobile">
    <div class="Items_Back_Mobile_m">
        <div class="product-details"><!--product-details-->
            <div class="container">
                <div class="row">
                    <div class="col-12"><div class="Discount_bar">
                            <?php if ($product['is_new']): ?>
                            <img  src="/Templates/images//new.jpg" class="newarrival" alt="" />
                            <?php endif; ?>
                            <?php if ($product['discount']): ?><span class="discount_date_w_mobile"><?php echo $product['discount_date'];?></span>
                            <?php endif; ?></div>
                        <div class="product-information"><!--/product-information-->
                            <h2 class="text-center"><?php echo $product['name_site'];?></h2><p class=" voted text-left">Код товара:<?php echo $product['code'];?></p>

                        </div>

                        <div class="col-12">
                            <div class="view-product">

                                <div class="row justify-content-center">

                                    <img  src="<?php echo Product::getImage($product['id']); ?>" style="margin-top:10px;" width="auto" height="350" alt="" />
                                    <?php if ($product['discount']): ?>
                                    <span class="product__discount">-<?php echo $product['discount_num'];?>%</span>
                                    <?php endif; ?>
                                </div>




                            </div>
                        </div>
                        <div class="row justify-content-center">

                        </div>
                        <div class="col-12">




                            <div class="But_add_mobile" >
                                    <span><div class="row justify-content-center"><?php if ($product['discount']): ?>
<div class="g-price-old-uah_w_mobile">
            <?php echo $product['last_price'];?><span class="g-price-old-uah-sign"> грн</span>
                                </div>
<?php endif; ?>
                                            <span class="price"><?php echo $product['price'];?>грн</span>
                                            </div><div class="row justify-content-center"><span class="count">Кол-во: <button class="down btn btn-default checkout" >
                                            <i class="fa fa-minus"></i></button><input type="text" class="quantity" id="quantity_mini" value="1" data-min-value="1" data-max-value="10000" min="1"  pattern="[0-9]*"/><button class="up btn btn-default checkout" >
                                            <i class="fa fa-plus"></i>
                                        </button><a href="#" class="btn btn-default add-to-cart_mini" data-quantity="1"  data-id="<?php echo $product['id']; ?>" ><i class="fa fa-shopping-cart"></i>В корзину</a></span>

                                            </span>

                            </div>





                            </span>
                        </div>
                        </br><h5 class="text-center">Характеристики товара:</h5>

                        <?php if($product['category_id'] !== '17' && $product['category_id'] !== '18'):?>
                        <p class="text-left"><b class="item_info_p">Обьем:</b><?php echo $product['size'];?>л</p>
                        <?php else: ?>
                        <p class="text-left"><b class="item_info_p">Обьем:</b><?php echo $product['size'];?>г</p>
                        <?php endif; ?>
                        <?php if ($product['category_id'] == 4): ?>

                        <p class="text-left"><b class="item_info_p">Цвет:</b>
                            <?php if($product['wine_color'] == 1) echo "<a href='/sub_wine/1'>белое</a>" ;?>
                            <?php if($product['wine_color'] == 2) echo "<a href='/sub_wine/2'>красное</a>" ;?>
                            <?php if($product['wine_color'] == 3) echo "<a href='/sub_wine/3'>розовое</a>" ;?>
                        </p>

                        <p class="text-left"><b class="item_info_p">Тип:</b>
                            <?php if($product['wine_class'] == 1) echo "екстра сухое" ;?>
                            <?php if($product['wine_class'] == 2) echo "сухое" ;?>
                            <?php if($product['wine_class'] == 3) echo "полусухое" ;?>
                            <?php if($product['wine_class'] == 4) echo "полусладкое" ;?>
                            <?php if($product['wine_class'] == 5) echo "сладкое" ;?>
                        </p>
                        <p class="text-left"><b class="item_info_p">Страна Производитель:</b>
                            <?php if($product['wine_category_id'] == 1) echo "<a href='/wine/categorys/1'><img class='image_flag_m ' src='/Templates/images/Flages/1.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 2) echo "<a href='/wine/categorys/2'><img class='image_flag_m ' src='/Templates/images/Flages/2.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 3) echo "<a href='/wine/categorys/3'><img class='image_flag_m ' src='/Templates/images/Flages/3.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 4) echo "<a href='/wine/categorys/4'><img class='image_flag_m ' src='/Templates/images/Flages/4.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 5) echo "<a href='/wine/categorys/5'><img class='image_flag_m ' src='/Templates/images/Flages/5.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 6) echo "<a href='/wine/categorys/6'><img class='image_flag_m ' src='/Templates/images/Flages/6.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 7) echo "<a href='/wine/categorys/7'><img class='image_flag_m ' src='/Templates/images/Flages/7.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 8) echo "<a href='/wine/categorys/8'><img class='image_flag_m ' src='/Templates/images/Flages/8.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 9) echo "<a href='/wine/categorys/9'><img class='image_flag_m ' src='/Templates/images/Flages/9.jpg' alt=''></a>" ;?>
                            <?php if($product['wine_category_id'] == 10) echo "<a href='/wine/categorys/10'><img class='image_flag_m ' src='/Templates/images/Flages/10.jpg' alt=''></a>" ;?>

                            <?php if($product['wine_category_id'] == 11) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Armenia.png' alt=''><a class='link' href='/wine/categorys/11'></a>" ;?>
                            <?php if($product['wine_category_id'] == 12) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Australia_n.png' alt=''> <a class='link' href='/wine/categorys/12'></a>" ;?>
                            <?php if($product['wine_category_id'] == 13) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Uar.png' alt=''><a class='link' href='/wine/categorys/13'></a>" ;?>
                            <?php if($product['wine_category_id'] == 14) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Ukraine.png' alt=''><a class='link' href='/wine/categorys/14'></a>" ;?>
                            <?php if($product['wine_category_id'] == 15) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Porto.png' alt=''><a class='link' href='/wine/categorys/15'></a>" ;?>
                            <?php if($product['wine_category_id'] == 16) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Geargia.png' alt=''><a class='link' href='/wine/categorys/16'></a>" ;?>
                            <?php if($product['wine_category_id'] == 17) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>" ;?>
                        </p>




                        <?php endif; ?>
                        <?php if ($product['category_id'] == 13): ?>

                        <p class="text-left"><b class="item_info_p">Цвет:</b>
                            <?php if($product['wine_color'] == 1) echo "<a href='/sub_wine/1'>белое</a>" ;?>
                            <?php if($product['wine_color'] == 2) echo "<a href='/sub_wine/2'>красное</a>" ;?>
                            <?php if($product['wine_color'] == 3) echo "<a href='/sub_wine/3'>розовое</a>" ;?>
                        </p></div>

                    <p class="text-left"><b class="item_info_p">Тип:</b>
                        <?php if($product['wine_class'] == 1) echo "екстра сухое" ;?>
                        <?php if($product['wine_class'] == 2) echo "сухое" ;?>
                        <?php if($product['wine_class'] == 3) echo "полусухое" ;?>
                        <?php if($product['wine_class'] == 4) echo "полусладкое" ;?>
                        <?php if($product['wine_class'] == 5) echo "сладкое" ;?>
                    </p>

                    <p class="text-left"><b class="item_info_p">Страна Производитель:</b>
                        <?php if($product['wine_category_id'] == 1) echo "<a href='/wine/categorys/1'><img class='image_flag_m ' src='/Templates/images/Flages/1.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 2) echo "<a href='/wine/categorys/2'><img class='image_flag_m ' src='/Templates/images/Flages/2.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 3) echo "<a href='/wine/categorys/3'><img class='image_flag_m ' src='/Templates/images/Flages/3.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 4) echo "<a href='/wine/categorys/4'><img class='image_flag_m ' src='/Templates/images/Flages/4.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 5) echo "<a href='/wine/categorys/5'><img class='image_flag_m ' src='/Templates/images/Flages/5.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 6) echo "<a href='/wine/categorys/6'><img class='image_flag_m ' src='/Templates/images/Flages/6.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 7) echo "<a href='/wine/categorys/7'><img class='image_flag_m ' src='/Templates/images/Flages/7.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 8) echo "<a href='/wine/categorys/8'><img class='image_flag_m ' src='/Templates/images/Flages/8.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 9) echo "<a href='/wine/categorys/9'><img class='image_flag_m ' src='/Templates/images/Flages/9.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 10) echo "<a href='/wine/categorys/10'><img class='image_flag_m ' src='/Templates/images/Flages/10.jpg' alt=''></a>" ;?>
                        <?php if($product['wine_category_id'] == 11) echo "<img class='image_flag_m' src='/Templates/images/Flag/Armenia.png' alt=''><a class='link' href='/wine/categorys/11'>Армения/</a>" ;?>
                        <?php if($product['wine_category_id'] == 12) echo "<img class='image_flag_m' src='/Templates/images/Flag/Australia_n.png' alt=''> <a class='link' href='/wine/categorys/12'>Австралия/</a>" ;?>
                        <?php if($product['wine_category_id'] == 13) echo "<img class='image_flag_m' src='/Templates/images/Flag/Uar.png' alt=''><a class='link' href='/wine/categorys/13'>Юар/</a>" ;?>
                        <?php if($product['wine_category_id'] == 14) echo "<img class='image_flag_m' src='/Templates/images/Flag/Ukraine.png' alt=''><a class='link' href='/wine/categorys/14'>Украина/</a>" ;?>
                        <?php if($product['wine_category_id'] == 15) echo "<img class='image_flag_m' src='/Templates/images/Flag/Porto.png' alt=''><a class='link' href='/wine/categorys/15'>Португалия/</a>" ;?>
                        <?php if($product['wine_category_id'] == 16) echo "<img class='image_flag_m' src='/Templates/images/Flag/Geargia.png' alt=''><a class='link' href='/wine/categorys/16'>Грузия/</a>" ;?>

                        <?php if($product['wine_category_id'] == 11) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Armenia.png' alt=''><a class='link' href='/wine/categorys/11'></a>" ;?>
                        <?php if($product['wine_category_id'] == 12) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Australia_n.png' alt=''> <a class='link' href='/wine/categorys/12'></a>" ;?>
                        <?php if($product['wine_category_id'] == 13) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Uar.png' alt=''><a class='link' href='/wine/categorys/13'></a>" ;?>
                        <?php if($product['wine_category_id'] == 14) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Ukraine.png' alt=''><a class='link' href='/wine/categorys/14'></a>" ;?>
                        <?php if($product['wine_category_id'] == 15) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Porto.png' alt=''><a class='link' href='/wine/categorys/15'></a>" ;?>
                        <?php if($product['wine_category_id'] == 16) echo "<img class='image_flag_m lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Geargia.png' alt=''><a class='link' href='/wine/categorys/16'></a>" ;?>
                        <?php if($product['wine_category_id'] == 17) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>" ;?>
                    </p>


                    <?php endif; ?>

                    <?php if ($product['parent']): ?>
                    <?php foreach ($categories_pod_name as $pod_category): ?>


                    <p class="text-left"><b class="item_info_p text-left">Производитель:</b><a href="/pod_categorys/<?php echo $pod_category['id'];?>"><?php echo $pod_category['name'];?></a></p>
                    <?php endforeach; ?>
                    <?php endif; ?>		        <?php if($product['category_id'] !== '17' && $product['category_id'] !== '18'):?>
                    <p class=" text-left"><b class="item_info_p">Крепость:</b><?php echo $product['strength'];?>%</p>
                    <?php endif; ?>

                    <?php if ($product['country']): ?>
                    <?php
                    $countries = $product['country'];



                    $countryList_name = Category::getCountries($countries);
                    ?>
                    <?php foreach ($countryList_name as $country): ?>

                    <p class="text-left"><b class="item_info_p">Страна Производитель:</b>
                        <a class='link' href="/country/<?php echo $country['id'];?>"><img class='image_flag_m ' src='<?php echo Category::getImage($country['id']); ?>' alt='' /></a></p>
                <?php endforeach; ?>
                <?php endif; ?>
                <!--/product-information-->
                </div>
            </div> </div>
        <div class="Description ">

            <div class="col-12">
                <h5 class="text-center">Описание товара:</h5>
                <p itemprop="description" class="text-body text-center"><?php echo $product['description'];?></p>
            </div>
        </div>

    </div><!--/product-details-->

