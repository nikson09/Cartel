<?php include ROOT. '/Site/layouts/H_F_1/header.php'; ?>

<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
  <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Drink King",
  "url": "https://drinkking.com.ua/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://drinkking.com.ua/bestsearch/?s_search5={search_term_string}&submit=",
    "query-input": "required name=search_term_string"
  }
}
</script>                      
      <script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Абсент",
    "item": "https://drinkking.com.ua/category/1"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "Бренди",
    "item": "https://drinkking.com.ua/category/2"  
  },{
    "@type": "ListItem", 
    "position": 3, 
    "name": "Вермут",
    "item": "https://drinkking.com.ua/category/3"  
  },{
    "@type": "ListItem", 
    "position": 4, 
    "name": "Вино",
    "item": "https://drinkking.com.ua/wine/"  
  },{
    "@type": "ListItem", 
    "position": 5, 
    "name": "Виски",
    "item": "https://drinkking.com.ua/category/5"  
  },{
    "@type": "ListItem", 
    "position": 6, 
    "name": "Водка",
    "item": "https://drinkking.com.ua/category/6"  
  },{
    "@type": "ListItem", 
    "position": 7, 
    "name": "Джин",
    "item": "https://drinkking.com.ua/category/7"  
  },{
    "@type": "ListItem", 
    "position": 8, 
    "name": "Кальвадос",
    "item": "https://drinkking.com.ua/category/8"  
  },{
    "@type": "ListItem", 
    "position": 9, 
    "name": "Коньяк",
    "item": "https://drinkking.com.ua/category/9"  
  },{
    "@type": "ListItem", 
    "position": 10, 
    "name": "Ликер",
    "item": "https://drinkking.com.ua/category/10"  
  },{
    "@type": "ListItem", 
    "position": 11, 
    "name": "Ром",
    "item": "https://drinkking.com.ua/category/11"  
  },{
    "@type": "ListItem", 
    "position": 12, 
    "name": "Текила",
    "item": "https://drinkking.com.ua/category/12"  
  },{
    "@type": "ListItem", 
    "position": 13, 
    "name": "Игристое",
    "item": "https://drinkking.com.ua/category/13"  
  }]
}
</script>          
<div class="baner">
  <div class="container">
    <div class="row justify-content-center">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php foreach($baners as $key => $baner) :?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ;?>" <?php if($baner['order_line'] == 1){ echo 'class="active"';} ;?>></li>
          <?php endforeach ;?>
        </ol>
        <div class="carousel-inner">
          <?php foreach($baners as $key => $baner) :?>
          <div <?php if($key == 0){ echo 'class="carousel-item active"';} else { echo 'class="carousel-item"' ;} ;?> >
            <a href="<?php echo $baner['href'] ;?>"><img  class="d-block w-100 lazy"  src="<?php echo Baner::getImage($baner['id']); ?>"></a>
          </div>
          <?php endforeach ;?>
      </div>
    </div>
   </div>
  </div>
</div>

<?php include ROOT. '/Site/layouts/H_F_1/section.php'; ?>

            



  


        <div class="col-9 padding-right">



            <div class="Items_Back">

 <div class="recommended_items"><!--recommended_items-->
                    <h3 class="title text-center">Рекомендуемые товары</h3>
                    
                    <div class="cycle-slideshow" 
                         data-cycle-fx=carousel
                         data-cycle-timeout=5000
                         data-cycle-carousel-visible=3
                         data-cycle-carousel-fluid=true
                         data-cycle-slides="div.item"
                         data-cycle-prev="#prev"
                         data-cycle-next="#next"
                         >                        
                             
                            <div class="row justify-content-center ">
                               <?php foreach ($sliderProducts as $sliderItem): ?>
                            <div class="item">
                                   <div class="col-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
<?php if ($sliderItem['discount'] == 1): ?><span class="discount_date"><?php echo $sliderItem['discount_date'];?></span>

<?php endif; ?>

<?php if ($sliderItem['discount'] == 0):?>  <span class="discount_none"></span> <?php endif; ?>
                                            <div class="row justify-content-center ">

                             <a href="/product/<?php echo $sliderItem['id'];?>">  <img class="lazy" src="data:image/gif;base64,R0lGODlhyQDXAIAAAP///wAAACH5BAEAAAEALAAAAADJANcAAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8YTjRw7evwIMqTIkSRLmjyJMiWlAgA7" data-src="<?php echo Product::getImage($sliderItem['id']); ?>" width="auto" height="215,783" alt="" /></a>
                             </div>
                             <div class="row justify-content-center " >
                                 
                                           
                                            
                                            </div>

                                            <p><a class="main-goods__title" style="white-space: normal;" href="/product/<?php echo $sliderItem['id']; ?>">
                                                <?php echo $sliderItem['name_site']; ?>

                                            </a></p>
<span class="country">                      <?php if($sliderItem['wine_category_id'] == 1) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/1.jpg' alt=''><a class='link' href='/wine/categorys/1'>Франция/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 2) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/2.jpg' alt=''> <a class='link' href='/wine/categorys/2'>Италия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 3) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/3.jpg' alt=''><a class='link' href='/wine/categorys/3'>Испания/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 4) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/4.jpg' alt=''><a class='link' href='/wine/categorys/4'>Германия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 5) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/5.jpg' alt=''><a class='link' href='/wine/categorys/5'>Австрия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 6) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/6.jpg' alt=''><a class='link' href='/wine/categorys/6'>Молдова/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 7) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/7.jpg' alt=''><a class='link' href='/wine/categorys/7'>Аргентина/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 8) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/8.jpg' alt=''><a class='link' href='/wine/categorys/8'>Новая Зеландия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 9) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/9.jpg' alt=''><a class='link' href='/wine/categorys/9'>Чили/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 10) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/10.jpg' alt=''><a class='link' href='/wine/categorys/10'>Америка/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 11) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Armenia.png' alt=''><a class='link' href='/wine/categorys/11'>Армения/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 12) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Australia_n.png' alt=''> <a class='link' href='/wine/categorys/12'>Австралия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 13) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Uar.png' alt=''><a class='link' href='/wine/categorys/13'>Юар/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 14) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Ukraine.png' alt=''><a class='link' href='/wine/categorys/14'>Украина/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 15) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Porto.png' alt=''><a class='link' href='/wine/categorys/15'>Португалия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 16) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Geargia.png' alt=''><a class='link' href='/wine/categorys/16'>Грузия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 17) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>" ;?>
                               <?php if ($sliderItem['country']): ?>

<?php 
        $countries = $sliderItem['country'];
       
       
        
        $countryList_name = Category::getCountries($countries);
        ?>
<?php foreach ($countryList_name as $country): ?>  

                    
                       <img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='<?php echo Category::getImage($country['id']); ?>' alt='' /><a class='link' href="/country/<?php echo $country['id'];?>"><?php echo $country['name_site'];?> / </a>
 <?php endforeach; ?>
 <?php endif; ?>
                               
                                                           <?php if ($sliderItem['parent']): ?>

<?php 
        $pod_categoryns = $sliderItem['parent'];
        
        $categories_pod_names = Category::getCategoriesList_podn($pod_categoryns);
        ?>
<?php foreach ($categories_pod_names as $pod_category): ?>  

                    
                                    <a href="/pod_categorys/<?php echo $pod_category['id'];?>"><?php echo $pod_category['name'];?></a>
 <?php endforeach; ?>
 <?php endif; ?>
                                                            </span><div class="But_add" ><div class="row justify-content-center " >
<div class="row justify-content-center " >
<?php if ($sliderItem['discount']): ?>
<div class="g-price-old-uah_s">
            <?php echo $sliderItem['last_price'];?><span class="g-price-old-uah-sign"> грн</span>
                                </div>
<?php endif; ?>
                                            <h5 class="prics"><?php echo $sliderItem['price']; ?>грн</h5>
                                            
                                  </div>          
                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $sliderItem['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                            </div>
                                        </div>
                                        <?php if ($sliderItem['is_new']): ?>
                                            <img  src="/Templates/images/new.png" class="new_1" alt="" />
                                        <?php endif; ?>

<?php if ($sliderItem['discount']): ?>
<span class="product__discount">-<?php echo $sliderItem['discount_num'];?>%</span>
<?php endif; ?>
                                    </div>
                                </div></div>
                            </div>
                            </div>
                        <?php endforeach; ?>
                    

                   

                </div>
            
</div>





    
        

                
    <div class="last_items">
    <h3 class="title text-center">Новые товары</h4>
    
            <div class="row justify-content-center ">


        <?php foreach ($latestProducts as $product): ?>
            <div class="col-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
<?php if ($product['discount'] == 1): ?> <span class="discount_date"><?php echo $product['discount_date'];?></span> <?php endif; ?>
<?php if ($product['discount'] == 0):?>  <span class="discount_none"></span> <?php endif; ?>


                            <div class="row justify-content-center ">

                            <a href="/product/<?php echo $product['id'];?>">  <img class="lazy" src="data:image/gif;base64,R0lGODlhyQDXAIAAAP///wAAACH5BAEAAAEALAAAAADJANcAAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8YTjRw7evwIMqTIkSRLmjyJMiWlAgA7" data-src="<?php echo Product::getImage($product['id']); ?>" width="auto" height="215,783" alt="" /></a>
                            </div>
                            <?php if ($product['is_new']): ?>
                                <img  src="/Templates/images/new.png" class="new" alt="" />
                            <?php endif; ?>
<?php if ($product['discount']): ?>
<span class="product__discount">-<?php echo $product['discount_num'];?>%</span>
<?php endif; ?>
                            <div class="row justify-content-center " >
                                 
                                         
                                            
                                            </div>
<div class="Text_block" >
                            <p>
                                
                                <a class="main-goods__title" href="/product/<?php echo $product['id'] ;?>">
                                    <?php echo $product['name_site'];?>
                                </a>
                            </p>
<span class="country">              <?php if($product['wine_category_id'] == 1) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/1.jpg' alt=''><a class='link' href='/wine/categorys/1'>Франция/</a>" ;?>
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
                                                            </span>
</div>
 <div class="But_add" >

<div class="row justify-content-center " ><div class="row justify-content-center " >
<?php if ($product['discount']): ?>
<div class="g-price-old-uah">
            <?php echo $product['last_price'];?><span class="g-price-old-uah-sign"> грн</span>
                                </div>
<?php endif; ?>
                            <h5 class="pric"><?php echo $product['price'];?>грн</h5>
                            </div>
                           
                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                            </div>
                        </div> </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>


        </div><!--Товары-->
    </div><!--row товары-->

        </div>
</div><!--Col-sm-padding right-->
</div><!--row-->
    </div><!--container-->
</div>
</div>
<!--Мобильная версия сайта-->


    


            <div class="Items_Back_Mobile">

          

 <div class="recommended_items"><!--recommended_items-->

 
 
                    <h3 class="title text-center">Рекомендуемые товары</h3>
                    
                    <div class="cycle-slideshow" 
                         data-cycle-fx=carousel
                         data-cycle-timeout=5000
                         data-cycle-carousel-visible=2
                         data-cycle-carousel-fluid=true
                         data-cycle-slides="div.item"
                         data-cycle-prev="#prev_mobile"
                         data-cycle-next="#next_mobile"
                         >                        
                             
                            <div class="row justify-content-center ">
                               <?php foreach ($sliderProducts as $sliderItem): ?>
                            <div class="item">
                                
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
<?php if ($sliderItem['discount'] == 1): ?><span class="discount_date"><?php echo $sliderItem['discount_date'];?></span>

<?php endif; ?>

<?php if ($sliderItem['discount'] == 0):?>  <span class="discount_none"></span> <?php endif; ?>
                                            <div class="row justify-content-center ">
                             <a href="/product/<?php echo $sliderItem['id'];?>">  <img  class="lazy" src="data:image/gif;base64,R0lGODlhyQDXAIAAAP///wAAACH5BAEAAAEALAAAAADJANcAAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8YTjRw7evwIMqTIkSRLmjyJMiWlAgA7" data-src="<?php echo Product::getImage($sliderItem['id']); ?>" width="auto" height="215,783" alt="" /></a>
                             </div>
                             <div class="row justify-content-center " >
                                 
                                          
                                            
                                            </div>
                                            <a class="main-goods__title" href="/product/<?php echo $sliderItem['id']; ?>">
                                                <?php echo $sliderItem['name_site']; ?>
                                            </a><span class="country">              <?php if($sliderItem['wine_category_id'] == 1) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/1.jpg' alt=''><a class='link' href='/wine/categorys/1'>Франция/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 2) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/2.jpg' alt=''> <a class='link' href='/wine/categorys/2'>Италия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 3) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/3.jpg' alt=''><a class='link' href='/wine/categorys/3'>Испания/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 4) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/4.jpg' alt=''><a class='link' href='/wine/categorys/4'>Германия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 5) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/5.jpg' alt=''><a class='link' href='/wine/categorys/5'>Австрия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 6) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/6.jpg' alt=''><a class='link' href='/wine/categorys/6'>Молдова/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 7) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/7.jpg' alt=''><a class='link' href='/wine/categorys/7'>Аргентина/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 8) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/8.jpg' alt=''><a class='link' href='/wine/categorys/8'>Новая Зеландия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 9) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/9.jpg' alt=''><a class='link' href='/wine/categorys/9'>Чили/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 10) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flages/10.jpg' alt=''><a class='link' href='/wine/categorys/10'>Америка/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 11) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Armenia.png' alt=''><a class='link' href='/wine/categorys/11'>Армения/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 12) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Australia_n.png' alt=''> <a class='link' href='/wine/categorys/12'>Австралия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 13) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Uar.png' alt=''><a class='link' href='/wine/categorys/13'>Юар/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 14) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Ukraine.png' alt=''><a class='link' href='/wine/categorys/14'>Украина/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 15) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Porto.png' alt=''><a class='link' href='/wine/categorys/15'>Португалия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 16) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Geargia.png' alt=''><a class='link' href='/wine/categorys/16'>Грузия/</a>" ;?>
                                            <?php if($sliderItem['wine_category_id'] == 17) echo "<img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='/Templates/images/Flag/Japan.png' alt=''><a class='link' href='/wine/categorys/17'>Япония/</a>" ;?>
                               <?php if ($sliderItem['country']): ?>

<?php 
        $countries = $sliderItem['country'];
       
       
        
        $countryList_name = Category::getCountries($countries);
        ?>
<?php foreach ($countryList_name as $country): ?>  

                    
                       <img class='image_flag lazy' src='data:image/gif;base64,R0lGODlhCAAFAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAUAAAIFjI+py1gAOw==' data-src='<?php echo Category::getImage($country['id']); ?>' alt='' /><a class='link' href="/country/<?php echo $country['id'];?>"><?php echo $country['name_site'];?> / </a>
 <?php endforeach; ?>
 <?php endif; ?>
                               
                                                           <?php if ($sliderItem['parent']): ?>

<?php 
        $pod_categoryns = $sliderItem['parent'];
        
        $categories_pod_names = Category::getCategoriesList_podn($pod_categoryns);
        ?>
<?php foreach ($categories_pod_names as $pod_category): ?>  

                    
                                    <a href="/pod_categorys/<?php echo $pod_category['id'];?>"><?php echo $pod_category['name'];?></a>
 <?php endforeach; ?>
 <?php endif; ?>
                                                            </span><div class="But_add" ><div class="row justify-content-center " ><?php if ($sliderItem['discount']): ?>
<div class="g-price-old-uah_s">

                                 <?php echo $sliderItem['last_price'];?>  
                              <span class="g-price-old-uah-sign_s"> грн</span>
                                </div><?php endif; ?>
                                            <h5 class="pric"><?php echo $sliderItem['price']; ?>грн</h4>
                                            
                                            
                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $sliderItem['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                            </div>
                                        </div>
                                        <?php if ($sliderItem['is_new']): ?>
                                            <img  src="/Templates/images/new.png" class="new_1" alt="" />
                                        <?php endif; ?>
<?php if ($sliderItem['discount']): ?>
<span class="product__discount">-<?php echo $sliderItem['discount_num'];?>%</span>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php endforeach; ?>
                    

                   
  </div>
               
            





<div class="col-12">
    
        

           <h3 class="title text-center">Новые товары</h4>     
    <div class="last_items">
    
    
            <div class="row justify-content-center ">


        <?php foreach ($latestProducts as $product): ?>
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


        <!--Товары-->
    </div><!--row товары-->
</div>
        </div>
</div><!--Col-sm-padding right-->
</div><!--row-->
    <!--container-->


    






<?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>