 <?php
include ROOT. '/Site/layouts/H_F_1/header.php';
?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php
include ROOT. '/Site/layouts/H_F_1/section.php';
?>


            <div class="Register_shop   col-9 padding-right">
                <div class="features_items">
                    <h2 class="Trash_title title text-center">Корзина</h2>



                    <?php if ($result): ?>

                        <p class="title text-center">Заказ оформлен. Мы c вами свяжемся.</p>

                    <?php else: ?>

                        <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн.</p><br/>
<div class="row justify-content-center">
                        <div class="col-12">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
<div class="row justify-content-center">
                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с вами.</p>

                            <div class="login-form">
                                <form action="#" method="post">
<div class="col-12">
                                    <label for="c1_contact_first_name">Фио<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userName" placeholder="Фио" value="<?php echo $userName; ?>"/>
</div> 
<div class="col-12">
                                    <label  for="c1_contact_first_name">Номер телефона<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userPhone" placeholder="Номер телефона" value="<?php echo $userPhone; ?>"/>
                              </div> 
                              
                            
      <div class="col-12"> 
      
      
                                    <label for="c1_contact_first_name">Способ оплаты</label>
                                    <div class="input-group mb-3">
  <select name="userСonnection" value="$userСonnection" class="custom-select"  id="inputGroupSelect02">
    <option value="Пусто" selected>Способ оплаты</option>
    <option  value="Перевод на карту">Перевод на карту</option>
    <option  value="Наложенный платеж">Наложенный платеж</option>
  </select>
  <div class="input-group-append">
      
    
  </div>
</div>
                                   </div>
                                   <div class="col-12">
                                    <label  for="c1_contact_first_name">Область<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userOblast" placeholder="Область" value="<?php echo $userOblast; ?>"/>
                              </div> 
                              <div class="col-12">
                                    <label  for="c1_contact_first_name">Город<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userCity" placeholder="Город" value="<?php echo $userCity; ?>"/>
                              </div> 
<div class="col-12">                        
<label for="c1_contact_first_name">Комментарий к заказу</label>

                                    <textarea class="text-form form-control" type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/></textarea>
                                    </div>

                                    <br/>
                                    <br/>
                                    <input class="nab" type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                </form>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
</div>
            </div>
        </div>
    </div>
 </div>

<div class="Register_shop_mobile   col-12 padding-right">
                <div class="features_items">
                    <h2 class="Trash_title title text-center">Корзина</h2>



                    <?php if ($result): ?>

                        <p class="title text-center">Заказ оформлен. Мы c вами свяжемся.</p>

                    <?php else: ?>

                        <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн.</p><br/>
<div class="row justify-content-center">
                        <div class="col-12">
<div class="container">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с вами.</p>

                            <div class="login-form">
                                <form action="#" method="post">
<div class="col-12">
                                    <label for="c1_contact_first_name">Фио<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userName" placeholder="Фио" value="<?php echo $userName; ?>"/>
</div> 
<div class="col-12">
                                    <label  for="c1_contact_first_name">Номер телефона<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userPhone" placeholder="Номер телефона" value="<?php echo $userPhone; ?>"/>
                              </div> 
                              
                            
      <div class="col-12"> 
      
      
                                    <label for="c1_contact_first_name">Способ оплаты</label>
                                    <div class="input-group mb-3">
  <select name="userСonnection" value="$userСonnection" class="custom-select"  id="inputGroupSelect02">
    <option value="Пусто" selected>Способ оплаты</option>
    <option  value="Перевод на карту">Перевод на карту</option>
    <option  value="Наложенный платеж">Наложенный платеж</option>
  </select>
  <div class="input-group-append">
      
    
  </div>
</div>
                                   </div>
                                   <div class="col-12">
                                    <label  for="c1_contact_first_name">Область<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userOblast" placeholder="Область" value="<?php echo $userOblast; ?>"/>
                              </div> 
                              <div class="col-12">
                                    <label  for="c1_contact_first_name">Город<span class="req-star">*</span></label>
                                    
                                    <input class="form-control" type="text" name="userCity" placeholder="Город" value="<?php echo $userCity; ?>"/>
                              </div> 
<div class="col-12">                        
<label for="c1_contact_first_name ">Комментарий к заказу</label>

                                    <textarea class="text-form form-control" type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/></textarea>
                                    </div>

                                    <br/>
                                    <br/>
                                   
                                    <input type="submit" name="submit" class="nab" value="Оформить" />
                                </form>
                            </div>
                        </div>

                    <?php endif; ?>
</div>
                </div>
</div>
            </div>
        </div>
    </div>
</div>
 <?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>  



