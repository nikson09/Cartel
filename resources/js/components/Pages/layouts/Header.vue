<template>
    <div>
        <div class="appbar-mobile d-lg-none d-md-block header">
            <b-navbar variant="faded" type="dark" toggleable="lg">
                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                <b-navbar-brand tag="img" class="mb-0 mx-3 navbar-brand-image" src="/images/картель.png">

                </b-navbar-brand>

                <b-navbar-nav class="ml-auto d-flex flex-row justify-content-between align-items-center">
                    <b-nav-item class="col-6">
                        <b-button v-b-toggle.collapse-2 size="lg" variant="link" toggle-class="text-decoration-none" no-caret>
                            <b-img src="/images/icon-cart.svg" alt=""></b-img>
                            <span class="cart-count"> {{ ordersCount }} </span>
                        </b-button>
                    </b-nav-item>
                    <b-nav-item class="col-6">
                <span>
                    <b-button v-b-toggle.collapse-1 class="user-button">
                        <b-img src="/images/user.png" rounded="circle" alt="Circle image" height="35px"></b-img>
                    </b-button>
                </span>
                    </b-nav-item>
                </b-navbar-nav>

                <b-collapse id="nav-collapse" is-nav class="">
                    <b-navbar-nav>
                        <b-nav-item :href="'/'" class="">
                            <div>
                            <span class="text-muted">
                              Главная
                            </span>
                            </div>
                        </b-nav-item>
                        <b-nav-item :href="'/category/' + item.id" class="" v-for="(item, index) in categories" key="index">
                            <div>
                            <span class="text-muted">
                              {{ item.name }}
                            </span>
                            </div>
                        </b-nav-item>
                    </b-navbar-nav>
                </b-collapse>

                <b-collapse id="collapse-1" is-nav >
                    <b-navbar-nav v-if="guest">
                        <b-nav-item :href="'/register'" class="">
                            <div>
                            <span class="text-muted">
                              Регистрация
                            </span>
                            </div>
                        </b-nav-item>
                        <b-nav-item :href="'/login'" class="">
                            <div>
                            <span class="text-muted">
                              Вход
                            </span>
                            </div>
                        </b-nav-item>
                    </b-navbar-nav>
                    <b-navbar-nav v-else>
                        <b-nav-item :href="'/cabinet'" class="">
                            <div>
                            <span class="text-muted">
                              Аккаунт
                            </span>
                            </div>
                        </b-nav-item>
                        <b-nav-item :href="'/cabinet/orders'" class="">
                            <div>
                            <span class="text-muted">
                              Заказы
                            </span>
                            </div>
                        </b-nav-item>
                        <b-nav-item :href="'/logout'" class="">
                            <div>
                            <span class="text-muted">
                              Выход
                            </span>
                            </div>
                        </b-nav-item>
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>
        </div>
        <b-collapse id="collapse-2" class="card-container">
            <basket/>
        </b-collapse>
    </div>
</template>

<script>
export default {
    name: "Header.vue",
    props: {
        categories: {
            default: []
        },
        ordersCount: {
            default: 0
        },
        guest: {
            default: false
        }
    },
    methods: {
        getOrdersCount()
        {
            axios.get('/getBasket').then(response => {
                let orders = response.data;

                this.ordersCount = orders.quantity;
            });
        }
    },
    mounted() {
        this.getOrdersCount();
    }
}
</script>

<style scoped>
    .header{
        background: rgb(22, 20, 24);
    }

    .navbar-brand-image {
        width: 27vw;
        height: auto;
    }

    .cart-count {
        position: absolute;
        top: 3px;
        left: 22px;
        padding: 0 7px;
        font-size: 9px;
        background-color: #ff7d1a;
        color: #fff;
        border-radius: 5px;
    }

    .user-button{
        background: none;
        border: none;
        width: 3vw;
    }

    .user-button:focus{
        outline: none;
        border-color: inherit;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .user-button:active{
        color: inherit !important;
        background-color: inherit !important;
        border-color: inherit !important;
        outline: none !important;
    }

    .user-button:active:focus {
        box-shadow: none !important;
    }

    .card-container.show{
        position: absolute !important;
        height: 100% !important;
        width: 100% !important;
    }
</style>
