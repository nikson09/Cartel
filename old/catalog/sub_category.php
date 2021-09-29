<?php
include ROOT. '/Site/layouts/H_F_1/header.php';
?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php
include ROOT. '/Site/layouts/H_F_1/section.php';
?>

<div class="col-9 padding-right" >
    <div class="features_items"><!--features_items-->

<div class="baner_mug">
<img   src="/Templates/images/Category/101.png" >
</div>
        <div class="Items_Back">
            <?php if ($categoryNew): ?>
        <h2 id="info" class="page-title text-center">
            <span class="base title text-center" data-ui-id="page-title-wrapper">Действующие акции Drink King</span>        </h1>
            <?php endif; ?>

<div class="row">
        <?php foreach ($categoryNew as $product): ?>
            <div class="col-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
<?php if ($product['discount'] == 1): ?> <span class="discount_date"><?php echo $product['discount_date'];?></span> <?php endif; ?>
<?php if ($product['discount'] == 0):?>  <span class="discount_none"></span> <?php endif; ?>
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
                                <a class="main-goods__title" href="/product/<?php echo $product['id'];?>">
                                    <?php echo $product['name_site'];?>
                                </a>
                            </p><span class="country">              <?php if($product['wine_category_id'] == 1) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/1.jpg' alt=''><a class='link' href='/wine/categorys/1'>Франция/</a>" ;?>
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
                                                            </span><div class="But_add" ><div class="row justify-content-center " >
<div class="row justify-content-center " >
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
</div></div></div>
<div class="Items_Back_Mobile">
            <?php if ($categoryNew): ?>
        <h3 class="title text-center">Акции</h3>
            <?php endif; ?>

<div class="last_items_mobile">
            <div class="row justify-content-center ">


        <?php foreach ($categoryNew as $product): ?>
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
                                <a class="main-goods__title" href="/product/<?php echo $product['id'] ;?>">
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
                    </div>
                </div>
            </div>
</div>
        <?php endforeach;?>


</div>
</div>
       <?php echo $mobile_pagination->get(); ?>
</div>
</section>
<?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>
