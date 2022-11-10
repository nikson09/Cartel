<template>
    <div>
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
    name: "Categories.vue",
    props: {
        products: {
            default: []
        },
        category: {
            default: []
        }
    }
}
</script>

<style scoped>
    .recomended_products {
        margin-top: 2vw;
        padding: 1vw;
    }
</style>
<style>
    body{
        background: #fff;
    }
</style>
