<?php
include ROOT. '/Site/layouts/H_F_1/header.php';
?>
<nav class="mainNav-mobile   clearfix ">

    <div class="clearfix main-header-btn Menu_Category_mobile">


        <a href="javascript:void(0);" class=" dropdown-toggle link-catalog text-left"  data-toggle="collapse" data-target="#navbar-header_mobile" aria-haspopup="true" aria-expanded="false" ><i></i>
        Каталог
       </a>
        <a href="javascript:void(0);" class="link-free-call text-right dropdown-toggle"  data-toggle="collapse" data-target="#navbar-header_mobile_m" aria-haspopup="true" aria-expanded="false" >Подкатегория</a>            </div></div>
            
   
</div>
</nav>

               
      <div id="navbar-header_mobile" class="dropdown-menu sidebar_mobile" style="height: 625px;  width: 100%;padding: 6px 6px 6px 10px !important;">
          
                <?php foreach ($categories_2 as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><a href="/sub_categorys/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h6>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    
                    <h4 id="categor_name">Категории</h4>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h6>
                                </div>
                            </div>

                    <?php endforeach; ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <a href="/wine/">Вино
                                    </a></h6>
                        </div>
                    </div>
                        <?php foreach ($categories_3 as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h6>
                                </div>
                            </div>

                        <?php endforeach; ?>
                        </div>
                        </div>



<div id="navbar-header_mobile_m" class="dropdown-menu sidebar_mobile" style="height: 625px;  width: 100%;padding: 6px 6px 6px 10px !important;">
          
                

                        <div class="panel-group category-products">
                        <?php foreach ($categories_pod as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/pod_categorys/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h6>
                                </div>
                            </div>

                    <?php endforeach; ?>
                        </div>

</div>
<section>


    
 
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                    <h4 id="categor_name">Категории</h4>
                    <div class="panel-group category-products">
                        <?php foreach ($categories_pod as $categorysItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/pod_categorys/<?php echo $categorysItem['id'];?>">
                                            <?php echo $categorysItem['name'];?></a></h6>
                                </div>
                            </div>

                    <?php endforeach; ?>
<?php  if ($country_list) : ?>
</div>
    <br/>


                    <h4 id="categor_name">Страны</h4>
                    <div class="panel-group category-products">
                        <?php foreach ($country_list as $countryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/country/<?php echo $countryItem['id'];?>">
                                            <?php echo $countryItem['name_site'];?></a></h6>
                                </div>
                            </div>

                    <?php endforeach; ?>


 <?php endif; ?>

                   


            </div>
                </div>
            </div><!--Категории-->



<div class="col-9 padding-right" >
    <div class="features_items"><!--features_items-->

 <?php foreach ($categories_name as $category): ?>
 
 

 <?php if ($category['id'] == 1): ?>

        <div class="baner_mug">
<img   src="/Templates/images/Category/1.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 2): ?>
      <div class="baner_mug">
<img   src="/Templates/images/Category/2.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 3): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/3.png" >
</div>
<?php endif; ?>

<?php if ($category['id'] == 5): ?>
       <div class="baner_mug">
<img   src="/Templates/images/Category/5.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 6): ?>
       <div class="baner_mug">
<img   src="/Templates/images/Category/6.png" >
</div>
<?php endif; ?>
        
<?php if ($category['id'] == 7): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/7.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 8): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/8.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 9): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/9.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 10): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/10.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 11): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/11.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 12): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/12.png" >
</div>
<?php endif; ?>
<?php if ($category['id'] == 13): ?>
        <div class="baner_mug">
<img   src="/Templates/images/Category/13.png" >
</div>
<?php endif; ?>
       
<?php endforeach; ?>
       


    <div class="Items_Back ">
       
        <?php foreach ($categories_pod_name  as $categoryas): ?>
 <h3 class="title text-center"><?php echo $categoryas['name'] ;?></h3>

 <?php endforeach; ?>



            <div class="row justify-content-center ">


        <?php foreach ($pod_categoryProducts as $product): ?>
            <div class="col-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
<?php if ($product['discount']): ?><span class="discount_date"><?php echo $product['discount_date'];?></span>
<?php endif; ?>
                            <div class="row justify-content-center ">
                            <a href="/product/<?php echo $product['id'];?>">  <img  src="<?php echo Product::getImage($product['id']); ?>" width="auto" height="215,783" alt="" /></a>
                            </div>
                            <?php if ($product['is_new']): ?>
                                <img  src="/Templates/images/new.png" class="new" alt="" />
                            <?php endif; ?>
<?php if ($product['discount']): ?>
<span class="product__discount">-<?php echo $product['discount_num'];?>%</span>
<?php endif; ?>
                            <div class="row justify-content-center " >
                                 
                                       
                                            
                                            </div>
                            <p>
                                <a class="main-goods__title" href="/product/<?php echo $product['id'] ;?>">
                                    <?php echo $product['name_site'];?>
                                </a>
                            </p><span class="country">             <?php if($product['wine_category_id'] == 1) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/1.jpg' alt=''><a class='link' href='/wine/categorys/1'>Франция/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 2) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/2.jpg' alt=''> <a class='link' href='/wine/categorys/2'>Италия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 3) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/3.jpg' alt=''><a class='link' href='/wine/categorys/3'>Испания/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 4) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/4.jpg' alt=''><a class='link' href='/wine/categorys/4'>Германия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 5) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/5.jpg' alt=''><a class='link' href='/wine/categorys/5'>Австрия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 6) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/6.jpg' alt=''><a class='link' href='/wine/categorys/6'>Молдова/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 7) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/7.jpg' alt=''><a class='link' href='/wine/categorys/7'>Аргентина/</a>" ;?>
                                 <?php if($product['wine_category_id'] == 8) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/8.jpg' alt=''><a class='link' href='/wine/categorys/8'>Новая Зеландия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 9) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/9.jpg' alt=''><a class='link' href='/wine/categorys/9'>Чили/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 10) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/10.jpg' alt=''><a class='link' href='/wine/categorys/10'>Америка/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 11) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Armenia.png' alt=''><a class='link' href='/wine/categorys/11'>Армения/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 12) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Australia_n.png' alt=''> <a class='link' href='/wine/categorys/12'>Австралия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 13) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Uar.png' alt=''><a class='link' href='/wine/categorys/13'>Юар/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 14) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Ukraine.png' alt=''><a class='link' href='/wine/categorys/14'>Украина/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 15) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Porto.png' alt=''><a class='link' href='/wine/categorys/15'>Португалия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 16) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Geargia.png' alt=''><a class='link' href='/wine/categorys/16'>Грузия/</a>" ;?>
<?php if($product['wine_category_id'] == 17) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>" ;?>
                               <?php if ($product['country']): ?>

<?php 
        $countries = $product['country'];
       
       
        
        $countryList_name = Category::getCountries($countries);
        ?>
<?php foreach ($countryList_name as $country): ?>  

                    
                       <img class='image_flag' src='<?php echo Category::getImage($country['id']); ?>' alt='' /><a class='link' href="/country/<?php echo $country['id'];?>"><?php echo $country['name_site'];?> / </a>
 <?php endforeach; ?>
 <?php endif; ?>
                               
                                                           <?php if ( $product['parent']): ?>



      <?php  $pod_categoryn = $product['parent'];
      
        $categories_pod_name = Category::getCategoriesList_podn($pod_categoryn);?>
<?php foreach ($categories_pod_name as $pod_category): ?>  

                    
                                    <a href="/pod_categorys/<?php echo $pod_category['id'];?>"><?php echo $pod_category['name'];?></a>
 <?php endforeach; ?>
 <?php endif; ?>
                                                            </span><div class="But_add" ><div class="row justify-content-center " ><div class="row justify-content-center " >
<?php if ($product['discount']): ?>
<div class="g-price-old-uah">
            <?php echo $product['last_price'];?><span class="g-price-old-uah-sign"> грн</span>
                                </div>
<?php endif; ?>
                            <h5 class="pric"><?php echo $product['price'];?>грн</h5>
                                </div>
                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                            </div>
                        </div>
                    </div></div>
                </div>
            </div>
        <?php endforeach;?>



</div>
        <?php echo $pagination->get(); ?>
</div>

</div>

    </div>
</div>
</div>
<div class="Items_Back_Mobile ">
       
        <?php foreach ($categories_pod_name  as $categoryas): ?>
 <h3 class="title text-center"><?php echo $categoryas['name'] ;?></h3>

 <?php endforeach; ?>


<div class="last_items_mobile">
            <div class="row justify-content-center ">


        <?php foreach ($pod_categoryProducts  as $product): ?>
            <div class="col-6">
                <div class="product-image-wrapper_mobile">
                    <div class="single-products">
                        <div class="productinfo text-center">
<?php if ($product['discount'] == 1): ?> <span class="discount_date"><?php echo $product['discount_date'];?></span> <?php endif; ?>
<?php if ($product['discount'] == 0):?>  <span class="discount_none"></span> <?php endif; ?>

                            <div class="row justify-content-center ">
                            <a href="/product/<?php echo $product['id'];?>">  <img  class="lazy" src="data:image/gif;base64,R0lGODlhyQDXAIAAAP///wAAACH5BAEAAAEALAAAAADJANcAAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8YTjRw7evwIMqTIkSRLmjyJMiWlAgA7" data-src="<?php echo Product::getImage($product['id']); ?>" width="auto" height="215,783" alt="" /></a>
                            </div>
                            <?php if ($product['is_new']): ?>
                                <img  src="/Templates/images/new.png" class="new" alt="" />
                            <?php endif; ?>
<?php if ($product['discount']): ?>
<span class="product__discount">-<?php echo $product['discount_num'];?>%</span>
<?php endif; ?>
                            <div class="row justify-content-center " >
                                 
                                          
                                            
                                            </div>
                            <p>
                                
                                <a class="main-goods__title" style="white-space: normal;" href="/product/<?php echo $product['id'] ;?>">
                                    <?php echo $product['name_site'];?>
                                </a>
                            </p><span class="country">              
<?php if($product['wine_category_id'] == 1) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/1.jpg' alt=''><a class='link' href='/wine/categorys/1'>Франция/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 2) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/2.jpg' alt=''> <a class='link' href='/wine/categorys/2'>Италия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 3) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/3.jpg' alt=''><a class='link' href='/wine/categorys/3'>Испания/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 4) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/4.jpg' alt=''><a class='link' href='/wine/categorys/4'>Германия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 5) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/5.jpg' alt=''><a class='link' href='/wine/categorys/5'>Австрия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 6) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/6.jpg' alt=''><a class='link' href='/wine/categorys/6'>Молдова/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 7) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/7.jpg' alt=''><a class='link' href='/wine/categorys/7'>Аргентина/</a>" ;?>
                                 <?php if($product['wine_category_id'] == 8) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/8.jpg' alt=''><a class='link' href='/wine/categorys/8'>Новая Зеландия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 9) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/9.jpg' alt=''><a class='link' href='/wine/categorys/9'>Чили/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 10) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/10.jpg' alt=''><a class='link' href='/wine/categorys/10'>Америка/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 11) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Armenia.png' alt=''><a class='link' href='/wine/categorys/11'>Армения/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 12) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Australia_n.png' alt=''> <a class='link' href='/wine/categorys/12'>Австралия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 13) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Uar.png' alt=''><a class='link' href='/wine/categorys/13'>Юар/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 14) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Ukraine.png' alt=''><a class='link' href='/wine/categorys/14'>Украина/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 15) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Porto.png' alt=''><a class='link' href='/wine/categorys/15'>Португалия/</a>" ;?>
                                            <?php if($product['wine_category_id'] == 16) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Geargia.png' alt=''><a class='link' href='/wine/categorys/16'>Грузия/</a>" ;?>
<?php if($product['wine_category_id'] == 17) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>" ;?>
                               
<?php if ($product['country']): ?>

<?php 
        $countries = $product['country'];
       
       
        
        $countryList_name = Category::getCountries($countries);
        ?>
<?php foreach ($countryList_name as $country): ?>  

                    
                       <img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='<?php echo Category::getImage($country['id']); ?>' alt='' /><a class='link' href="/country/<?php echo $country['id'];?>"><?php echo $country['name_site'];?> / </a>
 <?php endforeach; ?>
 <?php endif; ?>
                               
                                                           <?php if ($product['parent']): ?>

<?php


        $pod_categoryn = $product['parent'];
       
        $categories_pod_name = Category::getCategoriesList_podn($pod_categoryn);?>

<?php foreach ($categories_pod_name as $pod_category): ?>  

                    
                                    <a href="/pod_categorys/<?php echo $pod_category['id'];?>"><?php echo $pod_category['name'];?></a>
 <?php endforeach; ?>
 <?php endif; ?>
                                                            </span> <div class="But_add" ><div class="row justify-content-center " ><div class="row justify-content-center " >
<?php if ($product['discount']): ?>
<div class="g-price-old-uah">
            <?php echo $product['last_price'];?><span class="g-price-old-uah-sign"> грн</span>
                                </div>
<?php endif; ?>
                            <h5 class="pric"><?php echo $product['price'];?>грн</h5>
                            </div>
                            
                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                            </div>
                        </div></div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>


</div>
</div>
        <?php echo $pagination->get(); ?>
</div>
</section>
<?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>
