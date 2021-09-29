 <?php
include ROOT. '/Site/layouts/H_F_1/header.php';
?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php
include ROOT. '/Site/layouts/H_F_1/section.php';
?>
 
 
 <div class=" Register_shop   col-9 padding-right">
               
                    
                     
                    
                    
                    
                    <h2 class="Trash_title  title text-center">Корзина</h2>
                    <div class="row justify-content-center">
                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Изображение товара</th>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Количество, шт</th>
<th></th>
                                <th>Стомость, грн</th>
                                <th></th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                   <td><div class="row justify-content-center">
                                      <a href="/product/<?php echo $product['id'];?>">  <img  src="<?php echo Product::getImage($product['id']); ?>" width="auto" height="149,917" alt="" /></a>
                                       </div></td>
                                    <td><?php echo $product['code'];?></td>
                                    <td>
                                        <a href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['name_site'];?>
                                        </a>
                                        </br>
<?php if ($product['discount']): ?>
<div class="old_price">
            <?php echo $product['last_price'];?>грн
                                </div>
<?php endif; ?><div class="coast">
<span id="price_item<?php echo $product['id']; ?>">
                                        <?php echo $product['price'];?>грн</span>

                                        </div>
                                    </td>
                                    <td colspan="2"><div class="row justify-content-center"><a href="#" class="btn btn-default Ajax-minus" data-quantity="1"  data-id="<?php echo $product['id']; ?>" ><i class="fa fa-minus"></i></a><span class="quantity" id="quantity<?php echo $product['id']; ?>" ><?php echo $productsInCart[$product['id']];?></span><a href="#" class="btn btn-default Ajax-plus" data-quantity="1"  data-id="<?php echo $product['id']; ?>" ><i class="fa fa-plus"></i></a></div></td>
                                    <td class="text-center"><span class="price_items" id ="price_items<?php echo $product['id']; ?>" data-price="<?php echo $productsInCart[$product['id']]*$product['price'];?>"><?php echo $productsInCart[$product['id']]*$product['price'];?>грн</span></td>                      
                                    <td>
                                        
                                         <a class="btn btn-default checkout" href="/cart/delete/<?php echo $product['id'];?>">
                                            <i class="fa fa-trash"></i
                                            >
                                        </a>
                                    </td>     
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="5">Общая стоимость:</td>
                                    
                                    <td colspan="2">
                                        <div class="row justify-content-center">
                                        <h4 ><span id="price_items_all"><?php echo $totalPrice;?></span></h4><h6>грн</h6>
                                        </div>
                                        </td>
                                </tr>
                            
                        </table><div class="checkout_button">
                    <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a></div>
                    
                    
                    <?php else: ?>
                     <div class="trash_shop">
                        <p>Корзина пуста</p>
                        

                        <div class="back_to_shop justify-content-center">
                        <a class="btn btn-default checkout justify-content-center" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a></div>
                        
                    <?php endif; ?>
                    
                  
</div></div>
                </div>
</div>
            </div>
        </div>
    </div>
    
    <div class=" Register_shop_mobile  col-12 padding-right">
               
                    
                     
                    
                    
                    
                    <h2 class="Trash_title  title text-center">Корзина</h2>
                    <div class="row justify-content-center">
                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Стоимость</th>
                                
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        
                                         <a class="btn btn-default checkout" href="/cart/delete/<?php echo $product['id'];?>">
                                            <i class="fa fa-trash"></i
                                            >
                                        </a>
                                    </td>
                                   <td><div class="row justify-content-center">
                                      <a href="/product/<?php echo $product['id'];?>">  <img  src="<?php echo Product::getImage($product['id']); ?>" width="auto" height="70,917" alt="" /></a>
                                       </div></td>
                                    
                                    <td>
                                        <a href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['name_site'];?>
                                        </a>
                                        </br><?php if ($product['discount']): ?>
<div class="old_price">
            <?php echo $product['last_price'];?>грн
                                </div>
<?php endif; ?><div class="coast"><span id="price_item_mini<?php echo $product['id']; ?>">
                                        <?php echo $product['price'];?>грн</span>
                                        </div>
                                    </td>
                                    <td colspan="2"><div class="row justify-content-center"><a href="#" class="btn btn-default Ajax-minus_mini" data-quantity="1"  data-id="<?php echo $product['id']; ?>" ><i class="fa fa-minus"></i></a><span id="quantity_mini<?php echo $product['id']; ?>" ><?php echo $productsInCart[$product['id']];?></span><a href="#" class="btn btn-default Ajax-plus_mini" data-quantity="1"  data-id="<?php echo $product['id']; ?>" ><i class="fa fa-plus"></i></a></div></td>
                                    <td><span id ="price_items_mini<?php echo $product['id']; ?>" data-price="<?php echo $productsInCart[$product['id']]*$product['price'];?>"><?php echo $productsInCart[$product['id']]*$product['price'];?>грн</span></td>           
                                         
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="3">Общая стоимость:</td>
                                    
                                    <td colspan="3">
                                        <div class="row justify-content-center">
                                        <h4 ><span id="price_items_all_mini"><?php echo $totalPrice;?></span></h4><h6>грн</h6>
                                        </div>
                                        </td>
                                </tr>
                            
                        </table><div class="checkout_button">
                    <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a></div>
                    
                    
                    <?php else: ?>
                     <div class="trash_shop">
                        <p>Корзина пуста</p>
                        
                        <div class="back_to_shop">
                        <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a></div>
                        </div>
                    <?php endif; ?>
                    
                  
</div>
                </div>
</div>
            </div>
        </div>
    </div>
    </section>
  <?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>  
    