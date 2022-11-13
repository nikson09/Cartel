<template>
    <div>
        <div class="recomended_products">
            <h2 class="text-left">Рекомендуемые товары</h2>
            <div class="col-12" style="display: flex;
    overflow-x: scroll;flex-wrap: wrap;">
                <product v-for="(item, key) in products" :product="item" :key="key" class="col-6 recomended_item" style="padding: 0;"></product>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",
    props: ['products']
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
