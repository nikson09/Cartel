</section>
<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="col-4"><img class="lazy autor" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="/Templates/images/autor.png" alt="" class="autor"></p>

                <p class="col-8 text-sm-right"><img class="lazy autor_site" src="data:image/gif;base64,R0lGODlh1wBDAIAAAP///wAAACH5BAEAAAEALAAAAADXAEMAAAKQjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusraylIAADs=" data-src="/Templates/images/3.svg" alt=""></p>
            </div>
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
</footer>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 




</script>
<script type="text/javascript">
[].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
	img.setAttribute('src', img.getAttribute('data-src'));
	img.onload = function() {
		img.removeAttribute('data-src');
	};
});
</script>
<script src="//code.jivosite.com/widget/HnMGnSsPrd" async></script>



<script src="/Templates/js/jquery.cycle2.min.js"></script>
<script src="/Templates/js/jquery.cycle2.carousel.min.js"></script>

<script type="text/javascript" language="javascript" src="/Templates/js/behavior.js"></script>

<script src="/Templates/js/jquery-ui.js"></script>
<script src="/Templates/js/awesomplete.js" ></script>



    

	

	
    
    
  





<script>
$(window).on('load', function() {
  setTimeout(function () { 
    $("#loader").delay(0.50).fadeOut().remove();   
  },);  
});
</script>

<script>
  form.addEventListener("focusin", () => $(".focused").addClass("shok"));
  form.addEventListener("focusout", () => $(".focused").removeClass("shok"));
</script>


<script>


 $(document).ready(function(){
   
        $(".add-to-cart").click(function () {
            var n = $(this);
            var id = n.attr("data-id");
           	var qty = 1;
		    	 if ( $("input").is("#quantity") )
			{
			qty = parseInt( $("#quantity" ).val() );	
			}
	       
  
            
            alert( "Товар добавлен в корзину");

 var deviceAgent = navigator.userAgent.toLowerCase(),
    agentID = deviceAgent.match(/(iphone|ipod|ipad)/),
    mobileLink = $('.add-to-cart_mini'); // Добавить этот класс всем ссылкам, которые должны нажиматься

touchMenuEvent = agentID ? "touchstart" : "click";
mobileLink.bind(touchMenuEvent, function() {
    $(this).click();
});
            
            $.ajax({
        url:'/cart/',
        data:{id:$(this).data('id')},
        success:function(){
            location.reload();
        }
       });          
           
            $.post("/cart/addAjax/"+id+"/"+qty,
            {
                
            }, 
            function (data) {
                $("#cart-count").html(data);
                $("#cart-count_mobile").html(data);
            });
            
            return false;
        });
    });
</script>
<script>







 $(document).ready(function(){
   
        $(".add-to-cart_mini").click(function () {
            var n = $(this);
            var id = n.attr("data-id");
           	var qty = 1;
		    	 if ( $("input").is("#quantity_mini") )
			{
			qty = parseInt( $("#quantity_mini" ).val() );	
			}
	       
  
            
            alert( "Товар добавлен в корзину");

            var deviceAgent = navigator.userAgent.toLowerCase(),
    agentID = deviceAgent.match(/(iphone|ipod|ipad)/),
    mobileLink = $('.add-to-cart_mini'); // Добавить этот класс всем ссылкам, которые должны нажиматься

touchMenuEvent = agentID ? "touchstart" : "click";
mobileLink.bind(touchMenuEvent, function() {
    $(this).click();
});
            
             $.ajax({
        url:'/cart/',
        data:{id:$(this).data('id')},
        success:function(){
            location.reload();
        }
       });          
            $.post("/cart/addAjax/"+id+"/"+qty,
            {
                
            }, 
            function (data) {
                $("#cart-count_mobile").html(data);
            });
            
            return false;
        });
    });
</script>
<script>


 $(document).ready(function(){
   
        $(".Ajax-minus").click(function () {
            var n = $(this);
            var id = n.attr("data-id");
	    var cartNum = parseInt($("#quantity"+id).text());	
	    var price = parseFloat( $("#price_item" + id).html() );
            var itog=document.getElementById("price_items_all");




      itog.innerHTML=parseFloat(itog.innerHTML)-parseFloat(price);
      $("#quantity" + id).html(cartNum);
      $("#price_items" + id).html( parseFloat(price * cartNum) + ' грн' );   

      $.ajax({
        url:'/cart/',
        data:{id:$(this).data('id')},
        success:function(){
            location.reload();
        }
       });
       $.post("/cart/AjaxminusPrice/"+id,
            {
                
            }, 
            function (data) {
               
              
               
            }
            );

            $.post("/cart/Ajaxminus/"+id,
            {
                
            }, 
            function (data) {
                
               $("#cart-count").html(data);
               $("#cart-count_mobile").html(data);
            }
            );
            
            return false;
        });
    });
</script>
<script>


 $(document).ready(function(){
   
        $(".Ajax-plus").click(function () {
            var n = $(this);
            var id = n.attr("data-id");
           	var cartNum = parseInt($("#quantity"+id).text());
			var cartNum = (cartNum < 1000000) ? cartNum + 1 : 1000000;
			var price = parseFloat( $("#price_item" + id).html() );
			var prices = parseFloat( $(".price_items").text() );
                        var itog=document.getElementById("price_items_all");


itog.innerHTML=parseFloat(itog.innerHTML)+parseFloat(price);
  $("#quantity" + id).html(cartNum);
$("#price_items" + id).html( parseFloat(price * cartNum) + ' грн' );
	

     
           
         $.ajax({
        url:'/cart/',
        data:{id:$(this).data('id')},
        success:function(){
            location.reload();
        }
       });     
            $.post("/cart/Ajaxplus/"+id,
            {
                
            }, 
            function (data) {
               
                $("#cart-count").html(data);
                $("cart-count_mobile").html(data);
            });
            
            
            return false;
        });
    });
</script>

<script>


 $(document).ready(function(){
   
        $(".Ajax-minus_mini").click(function () {
            var n = $(this);
            var id = n.attr("data-id");
          
	        var cartNum = parseInt($("#quantity_mini"+id).text());
	        var cartNum = (cartNum > 1) ? cartNum - 1 :1 ;
	        var price = parseFloat( $("#price_item_mini" + id).html() );
	        var  sum = parseFloat($("#price_items_all_mini").html() );
		var sum = sum -= parseFloat(price);
	        var itog=document.getElementById("price_items_all_mini");




      itog.innerHTML=parseFloat(itog.innerHTML)-parseFloat(price);	
      $("#quantity_mini" + id).html(cartNum);
      $("#price_items_mini" + id).html( parseFloat(price * cartNum) + ' грн' );   
      
        $.ajax({
        url:'/cart/',
        data:{id:$(this).data('id')},
        success:function(){
            location.reload();
        }
        });
            $.post("/cart/Ajaxminus/"+id,
            {
                
            }, 
            function (data) {
                
              
               $("#cart-count_mobile").html(data);
            }
            );
            
            return false;
        });
    });
</script>
<script>


 $(document).ready(function(){
   
        $(".Ajax-plus_mini").click(function () {
            var n = $(this);
            var id = n.attr("data-id");
           	var cartNum = parseInt($("#quantity_mini"+id).text());
			
			var cartNum = (cartNum < 1000000) ? cartNum + 1 : 1000000;
			var price = parseFloat( $("#price_item_mini" + id).html() );
			var prices = parseFloat( $("#price_items_mini" + id).html() );
	    		var itog=document.getElementById("price_items_all_mini");




      itog.innerHTML=parseFloat(itog.innerHTML)+parseFloat(price);
			
  $("#quantity_mini" + id).html(cartNum);
$("#price_items_mini" + id).html( parseFloat(price * cartNum) + ' грн' );
	

            $.post("/cart/Ajaxplus/"+id,
            {
                
            }, 
            function (data) {
               
                
                $("#cart-count_mobile").html(data);
            });
            
            
            return false;
        });
    });
</script>
<script>
$(document).ready(function() {
		$('.down').click(function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		});
		$('.up').click(function () {
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		});
	});
</script>



<script>
$(document).ready(function(){
$(function() {
$("[name=s_search5]").autocomplete({
minLength: 1,
appendTo: '.uirezultbd',
open: function(event, ui) {
$('.uirezultshapka_tr').html('<div class="uirezultshapka_td25">id</div><div class="uirezultshapka_td25">Название</div><div class="uirezultshapka_td25">Создано</div><div class="uirezultshapka_td25">Ссылка</div>');
},
source: '/Components/poiskbest.php?search_tip=title'
}); }); });
</script>





<script>

$("#navToggle_m").click(function() {
    $("#navToggle_m").toggleClass("active");
    $(".overlay").toggleClass("open");
    // this line ▼ prevents content scroll-behind
    $("body").toggleClass("locked"); 
});
</script>
</body>
</html>

