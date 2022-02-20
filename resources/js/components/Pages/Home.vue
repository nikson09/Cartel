<template>
    <div>
        <div class="recomended_products">
            <h5 class="text-center">Рекомендуемые товары</h5>
            <div class="col-12">
                <product v-for="(item, key) in products" :product="item" :key="key"></product>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home.vue",
    props: ['products']
}
</script>

<style scoped>
    .recomended_products {
        margin-top: 2vw;
    }
</style>
