<template>
    <div v-if="banners.length > 0">
        <div>
            <div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li v-for="(item, index) in banners"  key='index' data-target="#carouselExampleIndicators" :data-slide-to="index"
                            :class=" item.order_line == 1 ? 'active' : ''" ></li>
                    </ol>
                    <div class="carousel-inner">
                        <div v-for="(item, index) in banners" class="carousel-item" key="index"  :class="index == 0 ? 'active' : '' ">
                            <a :href="item.href">
                                <img  class="d-block w-100 lazy" style="height: 35vw;"  :src="'storage/banners/'+ item.image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Banners.vue",
    props: ['banners'],
}
</script>

<style scoped>
    .carousel-item {
         margin-left: 0 !important;
    }
</style>
