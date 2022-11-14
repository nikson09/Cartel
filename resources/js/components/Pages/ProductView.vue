<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12" style="padding-top: 2vw">
                <h1 class="text-left">{{product['name']}}</h1>
                <div class="row justify-content-center">
                    <div class="w_image_w img-thumbnail">
                        <span v-if="product['is_sales'] == 1" class="discount_date_w">
                                                до {{ product['discount_date'] }}</span>
                        <img class="img_w" :src="'/storage/products/'+ product['image']" alt=""/>
                        <span class="product__discount">-{{product['discount_percent']}}%</span>
                    </div>
                    <div class="product-about__right">
                        <img src="/images/new.jpg" class="newarrival" alt=""/>
                        <img v-if="product['quantity'] > 0" src="/images/templates/in_stock.png" class="quantity_product" alt="" />
                        <img v-else  src="/images/templates/under_the_order.png" class="quantity_product" alt="" />
                        <div class="product-about__block ng-star-inserted">
                            <div class="product-trade ng-star-inserted">
                                <div class="product-prices__inner ng-star-inserted" v-if="product['is_sales']">
                                    <p class="product-prices__big product-prices__big_color_red"> {{ product['discount_sum']}} <span class="product-prices__symbol">грн</span>
                                    </p>
                                    <p class="product-prices__small ng-star-inserted">{{ product['sum']}} <small>грн</small>
                                    </p>
                                </div>
                                <div class="product-prices__inner ng-star-inserted" v-else>
                                    <p class="product-prices__big"> {{ product['sum']}} <span class="product-prices__symbol">грн</span>
                                    </p>
                                </div>
                                <ul class="product-buttons">
                                    <li class="product-buttons__item ng-star-inserted">
                                        <div class="product__buy">
                                            <div class="toOrder ng-star-inserted">
                                                <button @click="addToCart(product.id)" type="button" class="buy-button button button--with-icon button--green button--medium ng-star-inserted" aria-label="Купить">
                                                    <svg width="24" height="24">
                                                        <use xlink:href="#icon-basket"></use>
                                                    </svg>
                                                    <span class="buy-button__label ng-star-inserted"> Купить </span>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-left">
                                <b class="item_info_p">Страна Производитель:</b>
                                <a class='link' :href="'/country/'+product['country']['id']+'/category/'+ product['category']['id'] ">
                                    <img class='image_flag_m ' :src="'https://cartelhookah.com.ua/storage/countries/'+ product['country']['image']" alt=''/>
                                </a>
                            </p>

                            <p class="text-left">
                                <b class="item_info_p text-left">Бренд:</b>
                                <a :href="'/brand/'+product['brand']['id']+'/category/'+ product['category']['id']">
                                    {{product['brand']['name']}}
                                </a>
                            </p>

                            <div class="col-12 justify-content-center" style="margin-top:2vw">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-home" aria-selected="true">Описание</a>
                                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-attributes" role="tab" aria-controls="nav-profile" aria-selected="false">Характеристики</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active text-center" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                                        <p class="text-body text-sm-center">{{product['description']}}</p>
                                    </div>
                                    <div class="tab-pane fade" id="nav-attributes" role="tabpanel" aria-labelledby="nav-attributes-tab">
                                        <h5 class="text-left" v-for="(attribute, key) in product['attributes']" :key="key" >
                                            <b class="item_info_p">{{ attribute['attribute']['name'] }}: </b>{{ attribute['value'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProductView",
        props: [
            'product'
        ],
        methods: {
            addToCart(id)
            {
                let quantity = 1;
                axios.post('/addProductToBasket', {
                    quantity: quantity,
                    productId: id
                }).then(response => {
                    swal({
                        text: "Товар успешно добавлен в корзину!",
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    });
                    this.$parent.$children[0].getOrdersCount()
                });
            }
        }
    }
</script>

<style scoped>
    .img-thumbnail {
        height: 80vw;
        width: auto;
        overflow: hidden;
    }
    .img_w{
        height: 80vw;
        width: auto;
        margin-top:0;
    }
    /*! CSS Used from: Embedded */
    div,span,h4,p,a,small,strong,b,ul,li,time{
        margin:0;
        padding:0;
        border:0;
        font-size:100%;
        font:inherit;
        vertical-align:baseline;
    }
    ul{
        list-style:none;
    }
    /*! CSS Used from: https://design.rozetka.com.ua/assets/common/css/common.min.css */
    *,:after,:before{
        box-sizing:border-box;
    }
    a:focus{
        box-shadow:0 0 0 2px #6fc4e5;
        outline:none;
        z-index:1;
    }
    button{
        outline:none;
    }
    button:focus{
        box-shadow:0 0 0 2px #6fc4e5;
        z-index:1;
    }
    .button,button{
        cursor:pointer;
    }
    button.button{
        line-height:normal;
    }
    .button{
        border:none;
        border-radius:4px;
        box-sizing:border-box;
        display:inline-block;
        font-family:BlinkMacSystemFont,-apple-system,Arial,Segoe UI,Roboto,Helvetica,sans-serif;
        margin:0;
        outline:none;
        padding-left:16px;
        padding-right:16px;
        position:relative;
        text-align:center;
        transition-duration:.2s;
        transition-property:color,background-color,border-color;
        transition-timing-function:ease-in-out;
    }
    .button,.button:hover{
        text-decoration:none;
    }
    .button:disabled,.button:disabled:hover{
        background-color:#eee;
        color:#a6a5a5;
        cursor:default;
    }
    .button svg{
        transition-duration:.2s;
        transition-property:fill;
        transition-timing-function:ease-in-out;
    }
    .button--medium{
        font-size:16px;
        height:40px;
        line-height:40px;
    }
    .button--green{
        background-color: #ffa912;
        color:#fff;
    }
    @media (hover:hover){
        .button--green:hover{
            background-color:#00bc52;
            color:#fff;
        }
    }
    .button--green:active{
        background-color:#00bc52;
        color:#fff;
    }
    .button--green:active,.button--green:visited{
        color:#fff;
    }
    .button--link:disabled svg{
        fill:#a6a5a5;
    }
    .button--with-icon{
        align-items:center;
        display:flex;
        flex-direction:row;
        justify-content:center;
    }
    .button--with-icon svg{
        fill:currentColor;
        flex-shrink:0;
        margin-right:12px;
    }
    h4{
        font-family:Rozetka,BlinkMacSystemFont,-apple-system,Arial,Segoe UI,Roboto,Helvetica,sans-serif;
    }
    b,strong{
        font-weight:700;
    }
    a{
        color:#3e77aa;
        cursor:pointer;
        text-decoration:none;
    }
    @media (hover:hover){
        a:hover{
            color:#f84147;
            text-decoration:underline;
        }
    }
    a:active{
        color:#f84147;
        text-decoration:underline;
    }
    .product-about__right{
        width:100%;
    }
    @media (min-width:768px){
        .product-about__right{
            width:50%;
            padding-left:24px;
            box-sizing:border-box;
        }
    }
    .product-about__block{
        margin-bottom:24px;
        border:1px solid #e9e9e9;
        border-radius:4px;
        box-sizing:border-box;
    }
    .product-about__block-heading button{
        font-size:100%;
    }
    .product-about__item+.product-about__item{
        border-top:1px solid #e9e9e9;
    }
    .product-statuses{
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
        margin-bottom:8px;
    }
    .product-statuses__item{
        margin-right:12px;
        margin-bottom:8px;
    }
    @media (min-width:1280px){
        .product-statuses__item{
            margin-bottom:16px;
        }
    }
    .product-trade{
        position:relative;
        display:flex;
        flex-direction:column;
        flex-wrap:wrap;
        padding-left:16px;
        padding-right:16px;
        padding-bottom:16px;
    }
    @media (min-width:1024px){
        .product-trade{
            flex-direction:row;
            align-items:center;
        }
    }
    .product-prices__inner{
        display:flex;
        flex-direction:column;
        justify-content:center;
        padding-top:16px;
        margin-bottom:8px;
    }
    @media (min-width:1024px){
        .product-prices__inner{
            margin-right:16px;
            margin-bottom:0;
        }
    }
    .product-prices__big{
        font-size:24px;
        line-height:1;
    }
    @media (min-width:1024px){
        .product-prices__big{
            font-size:36px;
        }
    }
    @media (min-width:1280px){
        .product-prices__big{
            width:auto;
        }
    }
    .product-prices__big_color_red{
        color:#f84147;
    }
    .product-prices__small{
        position:absolute;
        z-index:-1;
        left:20px;
        top:0;
        display:inline-block;
        margin-right:0;
        margin-bottom:0;
        padding-left:12px;
        padding-right:12px;
        background-color:#fff;
        transform:translateY(-50%);
        font-size:18px;
        color:#d2d2d2;
    }
    .product-prices__small:before{
        position:absolute;
        left:50%;
        top:50%;
        transform:translate(-50%,-50%);
        display:block;
        height:2px;
        width:calc(105% - 24px);
        background-color:#f84147;
        content:"";
    }
    .product-prices__symbol{
        margin-left:4px;
        font-size:20px;
    }
    @media (min-width:1024px){
        .product-prices__symbol{
            font-size:24px;
        }
    }
    .product-buttons{
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    @media (min-width:1024px){
        .product-buttons{
            flex-direction:row;
        }
    }
    .product-buttons__item{
        width:100%;
        padding-top:16px;
    }
    @media (min-width:1024px){
        .product-buttons__item{
            width:auto;
        }
    }
    @media (min-width:1024px){
        .product-buttons__item+.product-buttons__item{
            margin-left:16px;
        }
    }
    .product-buttons__item:empty{
        display:none;
    }
    .product__buy{
        width:100%;
    }
    @media (min-width:1280px){
        .product__buy{
            width:auto;
        }
    }
    .product__buy .buy-button{
        width:100%;
    }
    .product__compare .compare-button,.product__favorites .wish-button{
        width:48px;
        height:48px;
        margin:0;
    }
    .product-seller__stars svg{
        height:12px;
        margin-top:-4px;
        margin-right:2px;
    }
    .status-label{
        display:inline-flex;
        flex-direction:row;
        align-items:center;
        height:32px;
        padding-left:16px;
        padding-right:16px;
        border-radius:4px;
        font-size:14px;
        transition:all .2s ease-in-out;
    }
    .status-label svg{
        width:16px;
        height:16px;
        margin-right:12px;
        fill:currentColor;
    }
    .status-label--green{
        background-color:#f4faf6;
        color:#00a046;
    }
    .compare-button svg{
        vertical-align:middle;
        fill:#a6a5a5;
    }
    .compare-button svg{
        transition:all .2s ease;
    }
    .wish-button svg{
        vertical-align:middle;
        transition:all .2s ease;
        fill:#ffa900;
    }
    .product-stars__item svg{
        vertical-align:middle;
    }
    .product-statuses{
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
        margin-bottom:8px;
    }
    .product-statuses__item{
        margin-right:12px;
        margin-bottom:8px;
    }
    @media (min-width:1280px){
        .product-statuses__item{
            margin-bottom:16px;
        }
    }
    .product-trade{
        position:relative;
        display:flex;
        flex-direction:column;
        flex-wrap:wrap;
        padding-left:16px;
        padding-right:16px;
        padding-bottom:16px;
    }
    @media (min-width:1024px){
        .product-trade{
            flex-direction:row;
            align-items:center;
        }
    }
    .product-prices__inner{
        display:flex;
        flex-direction:column;
        justify-content:center;
        padding-top:16px;
        margin-bottom:8px;
    }
    @media (min-width:1024px){
        .product-prices__inner{
            margin-right:16px;
            margin-bottom:0;
        }
    }
    .product-prices__big{
        font-size:24px;
        line-height:1;
    }
    @media (min-width:1024px){
        .product-prices__big{
            font-size:36px;
        }
    }
    @media (min-width:1280px){
        .product-prices__big{
            width:auto;
        }
    }
    .product-prices__big_color_red{
        color:#f84147;
    }
    .product-prices__small{
        position:absolute;
        z-index:-1;
        left:20px;
        top:0;
        display:inline-block;
        margin-right:0;
        margin-bottom:0;
        padding-left:12px;
        padding-right:12px;
        background-color:#fff;
        transform:translateY(-50%);
        font-size:18px;
        color:#d2d2d2;
    }
    .product-prices__small:before{
        position:absolute;
        left:50%;
        top:50%;
        transform:translate(-50%,-50%);
        display:block;
        height:2px;
        width:calc(105% - 24px);
        background-color:#f84147;
        content:"";
    }
    .product-prices__symbol{
        margin-left:4px;
        font-size:20px;
    }
    @media (min-width:1024px){
        .product-prices__symbol{
            font-size:24px;
        }
    }
    .product-buttons{
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    @media (min-width:1024px){
        .product-buttons{
            flex-direction:row;
        }
    }
    .product-buttons__item{
        width:100%;
        padding-top:16px;
    }
    @media (min-width:1024px){
        .product-buttons__item{
            width:auto;
        }
    }
    @media (min-width:1024px){
        .product-buttons__item+.product-buttons__item{
            margin-left:16px;
        }
    }
    .product-buttons__item:empty{
        display:none;
    }
    .product__buy{
        width:100%;
    }
    @media (min-width:1280px){
        .product__buy{
            width:auto;
        }
    }
    .product__buy .buy-button{
        width:100%;
    }
    .product__compare .compare-button,.product__favorites .wish-button{
        width:48px;
        height:48px;
        margin:0;
    }
    .product-about__right{
        width:100%;
    }
    @media (min-width:768px){
        .product-about__right{
            width:50%;
            padding-left:24px;
            box-sizing:border-box;
        }
    }
    .product-about__block{
        margin-bottom:24px;
        border:1px solid #e9e9e9;
        border-radius:4px;
        box-sizing:border-box;
    }
    .product-about__block-heading button{
        font-size:100%;
    }
    .product-about__item+.product-about__item{
        border-top:1px solid #e9e9e9;
    }
    @media (hover:hover){
        .other-sellers__link[_ngcontent-rz-client-c281]:hover .other-sellers__label[_ngcontent-rz-client-c281]{
            text-decoration:underline;
        }
    }
    .other-sellers__link[_ngcontent-rz-client-c281]:active .other-sellers__label[_ngcontent-rz-client-c281]{
        text-decoration:underline;
    }
    .product-delivery__item+.product-delivery__item{
        margin-top:8px;
    }
    .product-delivery__time time{
        font-weight:700;
    }

    .product-about__right{
        margin-top: 2vw
    }
    span.discount_date_w {
        overflow: hidden;
        width: 32vw;
        height: 6.3vw;
        left: 32vw;
    }
    span.product__discount {
        left: 22vw;
        top: 21vw;
        padding-top: 2vw;
    }
    img.newarrival {
        margin-left: 5vw;
        margin-bottom: 5vw;
    }
    img.quantity_product {
        width: 20vw;
        padding-bottom: 5vw;
    }
</style>
