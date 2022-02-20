<template>
    <b-card :style="'min-height:100%;z-index: 200;'">
        <h5 class="text-left">Корзина:</h5>
        <div v-if="products.length > 0 || notRelatedProducts.length > 0">
            <div class="d-flex" v-for="(item, index) in products" key="index">
                <div class="left-side">
                    <img :src="'/storage/products/'+ item.image" width="130" height="auto" alt="Изображение товара отсутствует">
                </div>
                <div class="right-side">
                    <p class="right-side-text">{{ item.name }}</p>
                    <div class="product-text">
                        <div class="quantity-side">
                            <button @click="removeOne(item.id)" class="quantity-button quantity-button-decrement"></button>
                            <div class="quantity-wrap">
                                <input @keyup="changeQuantity($event, item.id)" @change="changeQuantity($event, item.id)" v-model="item.quantity "  type="number" min="0" max="99"> <span>шт</span>
                            </div>
                            <button @click="() => {
                                    addMore(item.id)
                                }" class="quantity-button quantity-button-increment"></button>
                        </div>
                        <div class="old-price" v-if="item.is_sales">
                            {{ item.sum }} грн
                        </div>
                        <div class="new-price">
                            {{ item.is_sales ? item.discount_sum : item.sum }} грн
                        </div>
                        <b-button  class="btn-outline-danger" style="color:red" variant="link" @click="removeAllFromBasket(item.id, item.isRelated)">Удалить с корзины</b-button>
                    </div>
                </div>
            </div>
            <div class="d-flex" v-for="(item, key) in notRelatedProducts" key="key">
                <div class="left-side productHasRunOut">
                    <img :src="'/storage/products/'+ item.image" width="130" height="auto" alt="Изображение товара отсутствует">
                </div>
                <div class="right-side">
                    <p class="right-side-text">{{ item.name }}<br>(По предзаказу)</p>
                    <div class="product-text">
                        <div class="quantity-side">
                            <button @click="removeOne(item.id)" class="quantity-button quantity-button-decrement"></button>
                            <div class="quantity-wrap">
                                <input @keyup="changeQuantity($event, item.id)" @change="changeQuantity($event, item.id)" v-model="item.quantity "  type="number" min="0" max="99"> <span>шт</span>
                            </div>
                            <button @click="() => {
                                    addMore(item.id)
                                }" class="quantity-button quantity-button-increment"></button>
                        </div>
                        <div class="old-price" v-if="item.is_sales">
                            {{ item.sum }} грн
                        </div>
                        <div class="new-price">
                            {{ item.is_sales ? item.discount_sum : item.sum }} грн
                        </div>
                        <b-button class="btn-outline-danger" style="color:red" variant="link" @click="removeAllFromBasket(item.id, item.isRelated)">Удалить с корзины</b-button>
                    </div>
                </div>
            </div>
            <b-button class="justify-content-center btn-outline-primary w-100" variant="link" href="/checkout">
                Оформить заказ
            </b-button>
        </div>
        <div v-else>
            <p class="text-center">Корзина Пустая</p>
        </div>
    </b-card>
</template>

<script>
export default {
    name: "Basket.vue",
    data() {
        return {
            products: [],
            notRelatedProducts: []
        }
    },
    methods: {
        getBasket(){
            axios.get('/fetchBasketProducts').then(response => {
                this.products = response.data.products;
                this.notRelatedProducts = response.data.notRelatedProducts;
                this.$parent.$parent.getOrdersCount();
            });
        },
        addMore(id)
        {
            let quantity = 1;
            let productId = id;

            axios.post('addProductToBasket', {
                quantity: quantity,
                productId: productId
            }).then(response => {
                this.getBasket();
            });
        },
        changeQuantity(quantity, id)
        {
            if(!quantity.target.value){
                quantity.target.value = 0;
            }

            if(quantity.target.value < 0){
                quantity.target.value = 0;
            } else if(quantity.target.value > 99){
                quantity.target.value = 99;
            }

            let quantityVal = quantity.target.value;
            let productId = id;

            axios.post('changeQuantityProductInBasket', {
                quantity: quantityVal,
                productId: productId
            }).then(response => {
                this.getBasket();
            });
        },
        removeOne(id)
        {
            let productId = id;
            axios.post('removeOneProductFromBasket', {
                productId: productId
            }).then(response => {
                this.getBasket();
            });
        },
        removeAllFromBasket(id, isRelated)
        {
            let productId = id;
            axios.post('removeOneProductFromBasket', {
                productId: productId,
                removeAll: true,
                isRelated: isRelated
            }).then(response => {
                this.getBasket();
            });
        }
    },
    mounted() {
        this.$root.$on('bv::collapse::state', (collapseId, isJustShown) => {
            if(collapseId == 'collapse-2' && isJustShown){
                this.getBasket()
            }
        })
    }
}
</script>

<style scoped>
    .left-side {
        padding: 2vw 3vw;
        background-color: #fff;
        width: 50%;
    }
    .right-side {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 50%;
        text-align: left;
        padding: 6vw 1vw 0 2vw;
    }

    .right-side-text {
        cursor: pointer;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
    }

    .productHasRunOut {
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
    }

    .quantity-side {
        display: flex;
        width: 40vw;
    }

    .quantity-wrap span {
        min-width: 4vw !important;
    }

    .old-price{
        font-weight: 200;
        font-size: 12px;
        line-height: 16px;
        margin-top: 5px;
        text-decoration: line-through;
    }

    .new-price {
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        margin-top: 5px;
    }

    .product-text {
        top: -3vw;
        position: relative;
    }
</style>
