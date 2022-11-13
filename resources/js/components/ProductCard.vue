<template>
    <div class="wrapper">
        <span class="discount_date" style="width: 20vw;
    overflow: hidden;
    margin-left: 0;
    left: 15vw;" v-if="product['is_sales'] == 'true' || product['is_sales'] == '1'">
                                                    до {{ product['discount_date'] }}</span>
        <span v-else class="discount_none"></span>
        <img  v-if="product['quantity'] > 0" src="/images/templates/in_stock.png" class="quantity_product" alt="" />
        <img v-else src="/images/templates/under_the_order.png" class="quantity_product" alt="" />
        <img v-if="product['is_new'] == 1" src="/images/new.png" class="new" alt="" />
        <span v-if="product['is_sales'] == 1" class="product__discount">-{{ product['discount_percent'] }}%</span>
        <div class="top" :style="'background: url(/storage/products/'+ product.image +') no-repeat center center;'"></div>
        <div class="bottom">
            <div class="left">
                <div class="details">
                    <h1>{{ product.name }}</h1>
                    <span class="country_span">
                        <img :src="'https://cartelhookah.com.ua/storage/countries/'+(product['country'] ? product['country']['image'] : '')" alt="" class="country_image" style="margin-right: 0.3vw;">
                        <div class="d-flex" style="width: 29vw;font-size: 3vw;">
                            <a :href="'/country/'+product['country']['id']+'/category/'+ product['category']['id']" class="link">{{product['country']['site_name']}} |&ensp;</a>
                            <a :href="'/brand/' + product['brand']['id'] +'/category/'+ product['category']['id']"> {{product['brand']['name']}}</a>
                        </div>
                    </span>
                    <p v-if="product['is_sales'] == 1" style="width: 26vw;display: grid;"><span class="old_sum">{{product.sum}} грн</span><span class="red">{{ product.discount_sum }} грн</span></p>
                    <p v-else style="width: 26vw;display: grid;">{{ product.sum }} грн</p>
                </div>
                <div class="buy" @click="addToCart(product.id)">
                    <i class="material-icons">add_shopping_cart</i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductCard.vue",
    props: [
        'product'
    ],
    methods: {
        addToCart(id)
        {


        }
    },
    mounted() {

    }
}
</script>

<style scoped lang="scss">
.country_image{
    height: 5vw;
    width: auto;
}
.country_span{
    height: 15vw;
}
html, body{
    background: #E3E3D8;
    font-family: sans-serif;
    padding: 25px;
}

.wrapper{
    width: 57vw;
    height: 80vw;
    background: white;
    margin: auto;
    position: relative;
    overflow: hidden;
    border-radius: 10px 10px 10px 10px;
    box-shadow: 0;
    transform: scale(0.95);
    transition: box-shadow 0.5s, transform 0.5s;
    &:hover{
        box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
    }

        .top{
            height: 55%;
            width: 100%;
            -webkit-background-size: 100% !important;
            -moz-background-size: 100% !important;
            -o-background-size: 100% !important;
            background-size: 100% !important;
        }
        .bottom{
            width: 200%;
            height: 50%;
            transition: transform 0.5s;
            &.clicked{
                transform: translateX(-50%);
            }
            h1{
                margin: 0;
                padding: 0;
                font-size: 4vw;
                font-weight: 700;
                height: 14vw;
                overflow: hidden;
                width: 30vw;
            }
            p{
                margin:0;
                padding:0;
            }
            .left{
                height:100%;
                width: 50%;
                background: #f4f4f4;
                position:relative;
                float:left;
                .details{
                    padding: 1vw;
                    float: left;
                    width: calc(70% - 40px);
                }
                .buy{
                    float:right;
                    width: calc(30% - 2px);
                    height:100%;
                    background: #f1f1f1;
                    transition: background 0.5s;
                    border-left:solid thin rgba(0,0,0,0.1);
                    i{
                        font-size:30px;
                        padding: 5vw;
                        color: #254053;
                        transition: transform 0.5s;
                        padding-left: 2vw;
                        padding-top: 12vw;
                    }
                    &:hover{
                        background: #A6CDDE;
                    }
                    &:hover i{
                        transform: translateY(5px);
                        color:#00394B;
                    }
                }
            }
            .right{
                width: 50%;
                background: #A6CDDE;
                color: white;
                float:right;
                height:200%;
                overflow: hidden;
                .details{
                    padding: 1vw;
                    float: right;
                    width: calc(70% - 40px);
                }
                .done{
                    width: calc(30% - 2px);
                    float:left;
                    transition: transform 0.5s;
                    border-right:solid thin rgba(255,255,255,0.3);
                    height:50%;
                    i{
                        font-size:30px;
                        padding:30px;
                        color: white;
                    }
                }
                .remove{
                    width: calc(30% - 1px);
                    clear: both;
                    border-right:solid thin rgba(255,255,255,0.3);
                    height:50%;
                    background: #BC3B59;
                    transition: transform 0.5s, background 0.5s;
                    &:hover{
                        background: #9B2847;
                    }
                    &:hover i{
                        transform: translateY(5px);
                    }
                    i{
                        transition: transform 0.5s;
                        font-size:30px;
                        padding:30px;
                        color: white;
                    }
                }
                &:hover{
                    .remove, .done{
                        transform: translateY(-100%);
                    }
                }
            }
    }

    .inside{
        z-index:9;
        background: #92879B;
        width:140px;
        height:140px;
        position: absolute;
        top: -70px;
        right: -70px;
        border-radius: 0px 0px 200px 200px;
        transition: all 0.5s, border-radius 2s, top 1s;
        overflow: hidden;
        .icon{
            position:absolute;
            right:85px;
            top:85px;
            color:white;
            opacity: 1;
        }
        &:hover{
            width:100%;
            right:0;
            top:0;
            border-radius: 0;
            height:80%;
            .icon{
                opacity: 0;
                right:15px;
                top:15px;
            }
            .contents{
                opacity: 1;
                transform: scale(1);
                transform: translateY(0);
            }
        }
        .contents{
            padding: 5%;
            opacity: 0;
            transform: scale(0.5);
            transform: translateY(-200%);
            transition: opacity 0.2s, transform 0.8s;
            table{
                text-align:left;
                width:100%;
            }
            h1, p, table{
                color: white;
            }
            p{
                font-size:13px;
            }
        }
    }
}
.old_sum{
    font-size: 3vw;
    text-decoration-line: line-through;
}
.red{
    color: red;
    text-align: end;
}
.quantity_product {
    width: 12vw;
    left: 2vw;
    top: 11vw;
    position: absolute;
    z-index: 100;
}
</style>
