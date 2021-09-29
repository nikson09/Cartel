<?php
include ROOT. '/Site/layouts/H_F_1/header.php';
?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php
include ROOT. '/Site/layouts/H_F_1/section.php';
?>
        <div class="col-9 padding-right" >
            <div class="baner_mug">
                <img class="lazy" src="data:image/gif;base64,R0lGODlh6wQqAYAAAP///wAAACH5BAEAAAEALAAAAADrBCoBAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fz++/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPglllFJOSWWVVl6JZZZabslll15+CWaYYo5JZplmnolmmmquyWabbr4JZ5xyzklnnXbeiWeeeu7JZ59+/glooIIOSmihhh6KaKKKLspoo44+Cmmkkk5KaaWWXopppppuymmnnn4Kaqiijkpqqaaeimqqqq7KaquuvgprrLLOSmuttt6Ka6667sprr77+Cmywwg5LbLHGHovIbLLKLstss84+C2200k5LbbXWXottttpuy2233n4Lbrjijktuueaei2666q7LbrvuvgtvvPLOS2+99t6Lb7767stvv/7+C3DAAg9McMEGH4xwwgovzHDDDj8MccQST0xxxRZfjHHGGm/McccefwxyyCKPTHLJJp+Mcsoqr8xyyy6/DHPMMs9Mc80234xzzjrvzHPPPv8MdNBCD0100UYfjXTSSi/NdNNOPw111FJPTXXVVl+NddZab811115/DXbYYo9NdtmBFgAAOw==" data-src="/Templates/images/Category/kalyan.png" >
            </div>
            <div class="features_items"><!--features_items-->
                <div class="Items_Back">
                    <h4 class="text-center">Для Кальяна</h4>
                    <div class="Wine_countrys">
                        <div class="row justify-content-center">
                            <?php foreach($productCategories as $prodCat): ?>
                            <div class="single-products" style="position: relative;margin-right: 5px;width: 200px;height: 123px;margin-top: 17px;margin-bottom: 39px;">
                                <div class="productinfo text-center">
                                    <a href="/kalyans/<?php echo $prodCat['id'];?>"> <img width="auto" height="215,783" src="<?php echo KalyanCategory::getImage($prodCat['id']); ?>" alt="" /></a>
                                    <p><a href="/kalyans/<?php echo $prodCat['id'];?>"><?php echo $prodCat['name'];?></a></p>
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
        <h4 class="text-center">Для Кальяна</h4>
        <div class="Wine_colored_mobile ">
                <div class="row justify-content-center">
                 <?php foreach($productCategories as $prodCat): ?>
                  <div class="single-products" style="position: relative;margin-right: 5px;width: 200px;height: 123px;margin-top: 17px;margin-bottom: 39px;">
                    <div class="productinfo text-center">
                     <a href="/kalyans/<?php echo $prodCat['id'];?>"> <img width="auto" height="215,783" src="<?php echo KalyanCategory::getImage($prodCat['id']); ?>" alt="" /></a>
                     <p><a href="/kalyans/<?php echo $prodCat['id'];?>"><?php echo $prodCat['name'];?></a></p>
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
