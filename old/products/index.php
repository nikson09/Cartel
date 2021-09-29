<?php
include ROOT. '/Site/layouts/H_F_1/header.php';
?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php
include ROOT. '/Site/layouts/H_F_1/section.php';
?>
        <div class="col-9 padding-right" >
            <div class="baner_mug">
            </div>
            <div class="features_items"><!--features_items-->
                <div class="Items_Back">
                    <h4 class="text-center">Продукты</h4>
                    <div class="Wine_countrys">
                        <div class="row justify-content-center">
                            <?php foreach($productCategories as $prodCat): ?>
                            <div class="single-products" style="position: relative;margin-right: 5px;width: 200px;height: 123px;margin-top: 17px;margin-bottom: 39px;">
                                <div class="productinfo text-center">
                                    <a href="/productes/<?php echo $prodCat['id'];?>"> <img width="auto" height="215,783" src="<?php echo CategoryForProduct::getImage($prodCat['id']); ?>" alt="" /></a>
                                    <p><a href="/productes/<?php echo $prodCat['id'];?>"><?php echo $prodCat['name'];?></a></p>
                                </div>
                            </div>
                            <?php endforeach ; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="features_items"><!--features_items-->
    <div class="Items_Back_Mobile ">
        <h4 class="text-center">Продукты</h4>
        <div class="Wine_colored_mobile ">
                <div class="row justify-content-center">
                 <?php foreach($productCategories as $prodCat): ?>
                  <div class="single-products" style="position: relative;margin-right: 5px;width: 200px;height: 123px;margin-top: 17px;margin-bottom: 39px;">
                    <div class="productinfo text-center">
                     <a href="/productes/<?php echo $prodCat['id'];?>"> <img width="auto" height="215,783" src="<?php echo CategoryForProduct::getImage($prodCat['id']); ?>" alt="" /></a>
                     <p><a href="/productes/<?php echo $prodCat['id'];?>"><?php echo $prodCat['name'];?></a></p>
                   </div>
                 </div>
               <?php endforeach ; ?>
             </div>
           </div>
        </div>
    </div>
</div>

<?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>
