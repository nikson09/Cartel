<template>
    <div>
        <div class="d-flex w-100">
            <b-dropdown class="w-100 sub_categories" id="sub_categories_first_menu" text="Страны">
                <div v-if="countries">
                    <b-dropdown-item :href="'/country/'+item['id']+'/category/'+category['id']" v-for="(item, key) in countries" :key="key">{{ item['name'] }}</b-dropdown-item>
                </div>
                <div class="text-center" v-else>
                    <span>Пусто</span>
                </div>
            </b-dropdown>
            <b-dropdown class="w-100 sub_categories" id="sub_categories_second_menu" text="Бренды">
                <div v-if="brands">
                    <b-dropdown-item :href="'/brand/' + item['id'] +'/category/'+ category['id']" v-for="(item, key) in brands" :key="key">{{ item['name'] }}</b-dropdown-item>
                </div>
                <div class="text-center" v-else>
                    <span>Пусто</span>
                </div>
            </b-dropdown>
        </div>
        <div class="recomended_products">
            <h2 class="text-left">{{ category['name'] }}</h2>
            <div class="col-12" style="display: flex;
    overflow-x: scroll;flex-wrap: wrap;" v-if="products">
                <product v-if="products.length > 0" v-for="(item, key) in products" :product="item" :key="key" class="col-6 recomended_item" style="padding: 0;"></product>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",
    props: [
        'products',
        'category',
        'podCategories',
        'brands',
        'countries'
    ],
    mounted() {

    }
}
</script>

<style scoped>
    .recomended_products {
        margin-top: 2vw;
        padding: 1vw;
    }
    .sub_categories{
        border-radius: 0 !important;
    }
</style>
<style>
    body{
        background: #fff;
    }
    button#sub_categories_first_menu__BV_toggle_{
        border-radius: 0 !important;
        border-right: 0.3vw solid black;
    }
    button#sub_categories_second_menu__BV_toggle_{
        border-radius: 0 !important;
    }
</style>
