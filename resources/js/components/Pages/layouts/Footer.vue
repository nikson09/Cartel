<template>
    <div><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="col-4">
                        <img class="lazy autor" src="/images/autor.png" alt=""/>
                    </p>
                    <p class="col-8 text-sm-right">
                        <img class="lazy autor_site" src="/images/картель.png" alt=""/>
                    </p>
                </div>
            </div>
        </div>
        <div id="loader" class="loader">
            <div class="l_main">
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer.vue",
    mounted() {
        console.log(43);
    }
}
</script>

<style scoped>
    .footer-bottom{
        background: rgb(22, 20, 24);
    }
</style>
