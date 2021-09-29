


<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="col-4">Copyright © 2019</p>

                <p class="col-8 text-sm-right">K<i class="fa fa-chess-king"></i>ngDr<i class="fa fa-wine-bottle"></i>nk</p>
            </div>
        </div>
    </div>
</footer>

<script>
 $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            alert( "Товар добавлен в корзину");
            
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            
            return false;
        });
    });
</script>

</body>
</html>
