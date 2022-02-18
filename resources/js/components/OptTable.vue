import Swal from "sweetalert2";
import Swal from "sweetalert2";
<template>
    <div>
        <header class="page-header page-header-columns">
            <div class="container">
                <div class="page-header-main">
                    <div class="page-header-logo">
                        <a href="/" target="_blank">
                            <img style="background: black;" src="https://cartelhookah.com/images/картель.png" width="132" height="auto" alt="Логотип">
                        </a>
                        <p class="page-header-title">Онлайн-заказ в Cartel</p>
                    </div>
                    <div class="page-header-search">

                    </div>
                </div>
                <div class="page-header-customer">
                    <div class="customer">
                        <ul class="customer-data">
                            <li class="customer-name">
                                <span>Покупатель:</span>
                                {{ user.name + ' ' + user.LastName }}
                            </li>
                            <li class="customer-name" style="display: none;">
                                <span>Ваш заказ</span></li>
                            <li class="customer-info">
                                <span>Позиций в заказе:</span> {{ orderCount }}
                            </li>
                        </ul>
                        <div class="customer-bottom">
                            <div class="customer-total">Итого: <span class="customer-num">{{ totalSum }}</span>
                                <span class="customer-currency"> грн</span>
                            </div>
                            <div class="customer-checkout" :class="totalSum > 0 ? '' : 'button-disabled'">
                                <a @click="confirmOrder" href="javascript:void(0);" class="customer-button">Оформить
                                    заказ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <vue-bootstrap4-table :rows="rows" :columns="columns" :config="config">
                            <template slot="paginataion-previous-button">
                                Назад
                            </template>
                            <template slot="paginataion-next-button">
                                Вперед
                            </template>
                            <template slot="refresh-button-text" class="neon-button">
                                Обновить
                            </template>
                            <template slot="reset-button-text" class="neon-button">
                                Перезагрузить
                            </template>
                            <template slot="pagination-info" slot-scope="props">
                                Показано {{props.currentPageRowsLength}} по {{props.filteredRowsLength}} с {{props.originalRowsLength}} записей
                            </template>
                            <template slot="id" slot-scope="props">
                                <img :src="'/storage/products/'+ props.row.image" width="24" height="24" alt="Изображение товара отсутствует">
                                {{ props.cell_value }}
                            </template>
                            <template slot="count" slot-scope="props">
                                <div class="quantity">
                                    <button @click="removeOne(props)" class="quantity-button quantity-button-decrement"></button>
                                    <div class="quantity-wrap">
                                        <input @keyup="changeQuantity($event, props)" @change="changeQuantity($event, props)" v-model="props.cell_value" type="number" min="0" :max="props.row.max_count"> <span>шт</span>
                                    </div>
                                    <button @click="() => {
                                    addMore(props)
                                }" class="quantity-button quantity-button-increment"></button>
                                </div>
                            </template>
                            <template slot="price" slot-scope="props">
                                {{ props.cell_value }} грн
                            </template>
                            <template slot="sum" slot-scope="props">
                                {{ (parseInt(props.row.count) * parseInt(props.row.price)) }} грн
                            </template>
                        </vue-bootstrap4-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueBootstrap4Table from 'vue-bootstrap4-table'
    import axios from 'axios';

    export default {
        name: 'OptTable',
        components: {
            VueBootstrap4Table,
            axios
        },
        props: ['products', 'user'],
        data: function() {
            return {
                rows: [

                ],
                columns: [{
                    label: "Код",
                    name: "id",
                    filter: {
                        type: "simple",
                        placeholder: "Код"
                    },
                    sort: true,
                    },
                    {
                        label: "Наименование",
                        name: "name",
                        filter: {
                            type: "simple",
                            placeholder: "Введите наименование"
                        },
                        sort: true,
                    },
                    {
                        label: "Количество",
                        name: "count",
                        sort: false,
                    },
                    {
                        label: "Цена, грн",
                        name: "price",
                        sort: true
                    },
                    {
                        label: "Сумма, грн",
                        name: "sum",
                        sort: false
                    }
                ],
                config: {
                    checkbox_rows: false,
                    rows_selectable: false,
                    card_title: "",
                    global_search: {
                        placeholder: "Поиск",
                        visibility: true,
                        case_sensitive: false
                    }
                }
            }
        },
        computed:{
            orderCount(){
                let count = 0;

                this.rows.forEach((item, index) => {
                    count += item.count;
                });

                return count;
            },
            totalSum(){
                let sum = 0;

                this.rows.forEach((item, index) => {
                    sum += (parseInt(item.count) * parseInt(item.price));
                });

                return sum;
            }
        },
        methods:{
            addMore(prop){
              this.rows.forEach((item, index) => {
                  if(item.id == prop.row.id){
                      if(item.count < 99 && prop.row.max_count > item.count){
                          item.count += 1;
                      }
                  }
              });
            },
            removeOne(prop){
                this.rows.forEach((item, index) => {
                    if(item.id == prop.row.id){
                        if(item.count > 0){
                            item.count -= 1;
                        }
                    }
                });
            },
            changeQuantity(quantity, prop)
            {
                if(!quantity.target.value){
                    quantity.target.value = 0;
                }

                if(quantity.target.value < 0){
                    quantity.target.value = 0;
                } else if(quantity.target.value > 99){
                    if(prop.row.max_count > quantity.target.value){
                        quantity.target.value = 99;
                    } else {
                        quantity.target.value = quantity.target.value;
                    }
                }
                if(!(prop.row.max_count > quantity.target.value)){
                    quantity.target.value = prop.row.max_count;
                }

                this.rows.forEach((item, index) => {
                    if(item.id == prop.row.id){
                        item.count = parseInt(quantity.target.value);
                    }
                });
            },
            getProducts(){
                this.products.forEach((item, index) => {
                    this.rows.push({
                        'id': item.id,
                        'name': item.name,
                        'image': item.image,
                        'max_count': item.quantity,
                        'price': item.sum,
                        'sum': 0,
                        'count': 0
                    });
                });
                // axios.get(
                //     '/opt/getProducts'
                // ).then(response => {
                //     let products = response.data.products;
                //
                //     products.forEach((item, index) => {
                //         this.rows.push({
                //             'id': item.id,
                //             'name': item.name,
                //             'image': item.image,
                //             'max_count': item.quantity,
                //             'price': item.sum,
                //             'sum': 0,
                //             'count': 0
                //         });
                //     });
                // });
            },
            confirmOrder(){
                this.$swal.fire({
                    title: 'Обрабатывается',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showConfirmButton: false
                });
                this.$swal.showLoading();

                axios.post('/opt/checkout', {
                    'products': this.rows.filter(item => parseInt(item.count) > 0)
                }).then(response => {
                    if(response.data.success){
                        axios.get(
                            '/opt/getProducts'
                        ).then(response => {
                            let products = response.data.products;
                            this.rows = [];
                            products.forEach((item, index) => {
                                this.rows.push({
                                    'id': item.id,
                                    'name': item.name,
                                    'image': item.image,
                                    'max_count': item.quantity,
                                    'price': item.sum,
                                    'sum': 0,
                                    'count': 0
                                });
                            });
                            this.$swal.hideLoading();
                            this.$swal.close();
                        });
                    } else {
                        let errors = '';
                        response.data.errors.forEach((item , index) => {
                            if(index != 0){
                                errors = errors + '; '+ item;
                            } else {
                                errors += item;
                            }
                        });
                        this.$swal.fire({
                            title: 'Ошибка!',
                            text: errors,
                            icon: 'error',
                            confirmButtonText: 'Ок'
                        })
                        this.$swal.hideLoading();
                        // this.$swal.close();
                    }
                });
            },
        },
        mounted() {
            $('.input-group.col-sm-2').remove()
            this.getProducts();
        }
    }
</script>

<style>
    .vbt-refresh-button{
        margin-left: 1vw !important;
        height: 50px;
        padding: 10px 44px;
        font-weight: 700;
        font-size: 14px;
        line-height: 1.43;
        color: #2855af;
        border: solid 2px #2855af;
        border-radius: 10px;
        transition: .2s ease background-color,.2s ease color;
        background: none;
    }

    .vbt-reset-button{
        height: 50px;
        padding: 10px 44px;
        font-weight: 700;
        font-size: 14px;
        line-height: 1.43;
        color: #2855af;
        border: solid 2px #2855af;
        border-radius: 10px;
        transition: .2s ease background-color,.2s ease color;
        background: none;
    }

    /*! CSS Used from: https://b2b.moysklad.ru/css/iframes-d46cac14f8691eae307c78437ffa8c1b.css */
    *,*::before,*::after{box-sizing:border-box;}
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-min-d3a8bda02c2c4a82338fcc8eb1524e92.css */
    button{margin:0;font-size:100%;line-height:1.15;font-family:inherit;}
    button{overflow:visible;}
    button{text-transform:none;}
    button{-webkit-appearance:button;}
    button::-moz-focus-inner{padding:0;border-style:none;}
    button:-moz-focusring{outline:1px dotted ButtonText;}
    *,::after,::before{box-sizing:border-box;}
    .quantity-button{width:30px;height:25px;padding:0;background-color:transparent;background-repeat:no-repeat;background-position:center center;background-size:28px 24px;border:0;outline:0;}
    .quantity-button:not(.quantity-button-disabled){cursor:pointer;}
    .quantity-button:not(.quantity-button-disabled):active{opacity:.8;}
    .quantity-button-decrement{background-image:url(https://b2b.moysklad.ru/images/icon-decrement-ec0952d31e9edea6e4a2914364f2f22d.svg);}
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-5c868956a1993edbe1167f3ae9367a07.css */
    ::placeholder{font-size:16px;color:#9196A5;margin:0px 15px;}

    /*! CSS Used from: https://b2b.moysklad.ru/css/iframes-d46cac14f8691eae307c78437ffa8c1b.css */
    *,*::before,*::after{box-sizing:border-box;}
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-min-d3a8bda02c2c4a82338fcc8eb1524e92.css */
    input{margin:0;font-size:100%;line-height:1.15;font-family:inherit;}
    input{overflow:visible;}
    *,::after,::before{box-sizing:border-box;}
    .quantity-wrap{display:flex;align-items:center;padding:0 10px;}
    .quantity-wrap span{display:inline-block;min-width:50px;padding-left:5px;text-align:left;}
    .quantity input{width:46px;height:25px;padding:0 4px;font-weight:700;font-size:14px;text-align:right;background-color:transparent;border:solid 1px #cbd9f9;border-radius:3px;outline:0;-moz-appearance:textfield;}
    .quantity input:focus{border-color:#293b64;}
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-5c868956a1993edbe1167f3ae9367a07.css */
    ::placeholder{font-size:16px;color:#9196A5;margin:0px 15px;}

    /*! CSS Used from: https://b2b.moysklad.ru/css/iframes-d46cac14f8691eae307c78437ffa8c1b.css */
    *,*::before,*::after{box-sizing:border-box;}
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-min-d3a8bda02c2c4a82338fcc8eb1524e92.css */
    button,input{margin:0;font-size:100%;line-height:1.15;font-family:inherit;}
    button,input{overflow:visible;}
    button{text-transform:none;}
    button{-webkit-appearance:button;}
    button::-moz-focus-inner{padding:0;border-style:none;}
    button:-moz-focusring{outline:1px dotted ButtonText;}
    *,::after,::before{box-sizing:border-box;}
    .quantity{display:flex;justify-content:center;align-items:center;}
    .quantity-button{width:30px;height:25px;padding:0;background-color:transparent;background-repeat:no-repeat;background-position:center center;background-size:28px 24px;border:0;outline:0;}
    .quantity-button:not(.quantity-button-disabled){cursor:pointer;}
    .quantity-button:not(.quantity-button-disabled):active{opacity:.8;}
    .quantity-button-increment{background-image:url(https://b2b.moysklad.ru/images/icon-increment-f9526336cd35dd11b9a0507727f89e84.svg);}
    .quantity-button-decrement{background-image:url(https://b2b.moysklad.ru/images/icon-decrement-ec0952d31e9edea6e4a2914364f2f22d.svg);}
    .quantity-wrap{display:flex;align-items:center;padding:0 10px;}
    .quantity-wrap span{display:inline-block;min-width:50px;padding-left:5px;text-align:left;}
    .quantity input{width:46px;height:25px;padding:0 4px;font-weight:700;font-size:14px;text-align:right;background-color:transparent;border:solid 1px #cbd9f9;border-radius:3px;outline:0;-moz-appearance:textfield;}
    .quantity input:focus{border-color:#293b64;}
    /*! CSS Used from: https://b2b.moysklad.ru/css/pricelist-5c868956a1993edbe1167f3ae9367a07.css */
    ::placeholder{font-size:16px;color:#9196A5;margin:0px 15px;}
</style>
