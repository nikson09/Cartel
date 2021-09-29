  <?php include ROOT. '/Site/layouts/H_F_1/header.php'; ?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php include ROOT. '/Site/layouts/H_F_1/section.php'; ?>

<div class="col-9 padding-right">


   

      <div class="Items_Back">
<h3 class="title text-center">Результат поиска по ключевым словам:</h3>
 <div class="row justify-content-center ">      


<?php 

//подключаемся к БД
$thisbd = @mysqli_connect('localhost', 'nikson09', 'PpamWwt5s', 'id11297748_king_drink_shop') or die("Ошибка соединения с базой данных: ".mysql_error());
mysqli_query($thisbd, "SET NAMES utf8");
$referal = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['s_search5']))));

$count = 0;
 {   //Тип поиска - таких может быть бесконечно много - передается с autocomplete
$fetch = mysqli_query($thisbd, "SELECT * FROM product WHERE name LIKE '%$referal%' AND availability='1' AND status='1' ORDER BY name LIMIT 12");  //$_GET['term'] - поисковый запрос от autocomplete
while ($podrow = mysqli_fetch_array($fetch))    {
//формируем ассоциативный массив результата поиска
$return_arr[] = array (

         '
 
<div class="col-4">
<div class="Items_B">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">

                            <div class="row justify-content-center ">
                            <a href="/product/'.htmlspecialchars($podrow['id'], ENT_QUOTES).'">  <img  src="/upload/images/products/'.htmlspecialchars($podrow['id'], ENT_QUOTES).'.jpg" width="auto" height="215,783" alt="" /></a>
                            </div>
                            
                            <div class="row justify-content-center " >
                                 
                                           
                                            
                                            </div>
                            <p>
                                
                                <a class="main-goods__title" href="/product/'.htmlspecialchars($podrow['id'], ENT_QUOTES).'">
                                    '.htmlspecialchars($podrow['name_site'], ENT_QUOTES).'
                                </a>
                            </p><div class="But_add" ><div class="row justify-content-center " ><div class="row justify-content-center " >

                            <h5 class="pric">'.htmlspecialchars($podrow['price'], ENT_QUOTES).'грн</h5>
                            </div>
                            
                            <a href="#" class="btn btn-default add-to-cart" data-id="'.htmlspecialchars($podrow['id'], ENT_QUOTES).'"><i class="fa fa-shopping-cart"></i>В корзину</a>
                            </div></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<div class="Items_M col-12">


                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <div class="row justify-content-center ">
                            <a href="/product/'.htmlspecialchars($podrow['id'], ENT_QUOTES).'">  <img  src="/upload/images/products/'.htmlspecialchars($podrow['id'], ENT_QUOTES).'.jpg" width="auto" height="250,783" alt="" /></a>
                            </div>
                            
                            <div class="row justify-content-center " >
                                 
                                           
                                            
                                            </div>
                            <p>
                                
                                <a class="main-goods__title" href="/product/'.htmlspecialchars($podrow['id'], ENT_QUOTES).'">
                                    '.htmlspecialchars($podrow['name_site'], ENT_QUOTES).'
                                </a>
                            </p>
                            <h4 class="pric">'.htmlspecialchars($podrow['price'], ENT_QUOTES).'грн</h4>
                            
                            <div class="But_add" >
                            <a href="#" class="btn btn-default add-to-cart" data-id="'.htmlspecialchars($podrow['id'], ENT_QUOTES).'"><i class="fa fa-shopping-cart"></i>В корзину</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
'

   =>     'label' 



);
$count++;
}
if ($count == 0) $return_arr[0] = array('<p class="text-center">По данному запросу ничего не найдено!</p>'  =>     'label' , '<p class="text-center">Попробуйте ввести другой запрос!</p>'  =>     'value');
foreach($return_arr as $vald){
    //Print out the element if it isn't an array.

   
      for ($i = 0; $i <  count($vald); $i++) {
    $key=key($vald);
    $val=$vald[$key];
    if ($val<> ' ') {
       echo $key ;
       }
     next($vald);
    }
    
}
}
?>
</div>
</div>
</div>
</div>



<div class="Items_Back_Mobile">
<h3 class="title text-center">Результат поиска по ключевым словам:</h3>
 <div class="row justify-content-center ">



<?php 



   
     foreach($return_arr as $vald){
    //Print out the element if it isn't an array.

   
      for ($i = 0; $i <  count($vald); $i++) {
    $key=key($vald);
    $val=$vald[$key];
    if ($val<> ' ') {
       echo $key ;
       }
     next($vald);
    }
    
}
    

?>


</div>
</div>

</div>


<?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>