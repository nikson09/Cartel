/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('easy-autocomplete');

import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

window.Vue = require('vue');

const axios = require('axios').default;

Vue.use(VueSweetalert2);
Vue.use(BootstrapVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('opt-table', require('./components/OptTable.vue').default);
Vue.component('header-mobile', require('./components/Pages/layouts/Header.vue').default);
Vue.component('footer-mobile', require('./components/Pages/layouts/Footer.vue').default);
Vue.component('banners', require('./components/Pages/layouts/Banners.vue').default);
Vue.component('home', require('./components/Pages/Home.vue').default);
Vue.component('categories', require('./components/Pages/Categories.vue').default);
Vue.component('brands', require('./components/Pages/Brands.vue').default);
Vue.component('country', require('./components/Pages/Country.vue').default);
Vue.component('checkout', require('./components/Pages/Checkout.vue').default);
Vue.component('order_success', require('./components/Pages/OrderSuccess.vue').default);
Vue.component('product_view', require('./components/Pages/ProductView.vue').default);
Vue.component('basket', require('./components/Basket.vue').default);
Vue.component('product', require('./components/ProductCard.vue').default);
Vue.component('product-main', require('./components/ProductMain.vue').default);
Vue.component('test-product', require('./components/TestProduct.vue').default);
Vue.component('search-product', require('./components/SearchProduct.vue').default);
// Vue.component('Pagination', require('./components/Pagination.vue').default);
// Vue.component('product-list', require('./components/ProductList.vue').default);
Vue.component('filter-section', require('./components/FilterSection.vue').default);
// Vue.component('filter-panel', require('./components/FilterPanel.vue').default);
// Vue.component('product-cart', require('./components/ProductCart.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    computed: {
        isMobile() {
            return screen.width <= 600;
        }
    }, methods: {
        updateFilters(newFilters) {

            this.filters = newFilters;
            this.fetchFilteredProducts();
        },
        fetchFilteredProducts() {
            // Логика для получения отфильтрованных данных (например, через Axios)
        },
    }


});
