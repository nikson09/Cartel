<?php include ROOT . '/Site/layouts/header_admin.php'; ?>

<section>
    <div class="Register_shop container">
        

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <div class="divider_n"></div>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>
            
            
<div class="row justify-content-center">
<div class="col-4">
            <h4>Редактировать товар #<?php echo $id; ?></h4>
<h6>(Товар не обновить если не заполнить данные до изображения) </h6>
            

            
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">



                        <p>Название товара для сайта</p>
                        <input class="form-control" type="text" name="name_site" placeholder="Название товара для сайта...." value="<?php echo $product['name_site']; ?>">

                        <p>Название товара для гугла</p>
                        <input class="form-control" type="text" name="name" placeholder="Название товара для гугла...." value="<?php echo $product['name']; ?>">

                        <p>Артикул</p>
                        <input class="form-control" type="text" name="code" placeholder="Артикул....." value="<?php echo $product['code']; ?>">

<p>Штрихкод</p>
                        <input class="form-control" type="text" name="code_go" placeholder="Артикул...." value="<?php echo $product['code_go']; ?>">


<h3 class=text-center">Скидочная система</h3>

 <p>Включить скидку?</p>
                        <select class="custom-select" name="discount" onChange="Selected(this)">
<option  value="1" <?php if ($product['discount'] == 1) echo ' selected="selected" onselect="document.getElementById("info").style.display="block";"'; ?>>Да</option>
                            <option value="0" <?php if ($product['discount'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>
<div id="info" class="price_discount">
 <p>Процент скидки, -(?)%</p>
                        <input class="form-control" type="text" name="discount_num" placeholder="Процент скидки..." value="<?php echo $product['discount_num']; ?>">
<p>Стоимость без скидки, грн</p>
                        <input class="form-control" type="text" name="last_price" placeholder="Стоимость без скидки..." value="<?php echo $product['last_price']; ?>">
<p>Дата скидки,("До (31.12)")</p>
                        <input class="form-control" type="text" name="discount_date" placeholder="Стоимость без скидки..." value="<?php echo $product['discount_date']; ?>">
                   
</div>
                        <p>Текущая cтоимость, грн</p>
                        <input class="form-control" type="text" name="price" placeholder="Стоимость" value="<?php echo $product['price']; ?>">

                        <p>Категория</p>
                        <select class="custom-select" name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

                        <p>Производитель</p>
                        <input class="form-control" type="text" name="brand" placeholder="Производитель" value="<?php echo $product['brand']; ?>">
                        <p>Процент Алкоголя,%</p>
                        <input class="form-control" type="text" name="strength" placeholder="Процент Алкоголя...." value="<?php echo $product['strength']; ?>">
                        <p>Обьем Бутылки,л</p>
                        <input class="form-control" type="text" name="size" placeholder="Размер Бутылки...." value="<?php echo $product['size']; ?>">
                        

                        <p>Изображение товара</p>
                        <img src="<?php echo Product::getImage($product['id']); ?>"  width="270" height="auto" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>">

                        <p>Детальное описание</p>
                        <textarea class="text-form form-control" placeholder="Детальное описание" width="auto" height="500" name="description"><?php echo $product['description']; ?></textarea>
                        
                        <br/><br/>

                        <p>Наличие на складе</p>
                        <select class="custom-select" name="availability">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>
                        <h3 class="title-center">Пункты только для вина</h3>
                        
                        <p>Цвет Вина</p>
                        <select class="custom-select" name="wine_color">
                             <option value="0" <?php if ($product['wine_color'] == "0") echo ' selected="selected"'; ?>>Выбор цвета</option>
                            <option value="1" <?php if ($product['wine_color'] == 1) echo ' selected="selected"'; ?>>Белое</option>
                            <option value="2" <?php if ($product['wine_color'] == 2) echo ' selected="selected"'; ?>>Красное</option>
                            <option value="3" <?php if ($product['wine_color'] == 3) echo ' selected="selected"'; ?>>Розовое</option>
                        </select>
                        
                        <br/><br/>
                        
                        <p>Тип Вина</p>
                        <select class="custom-select" name="wine_class">
                             <option value="0" <?php if ($product['wine_class'] == 0) echo ' selected="selected"'; ?>>Выбор типа вина</option>
                            <option value="1" <?php if ($product['wine_class'] == 1) echo ' selected="selected"'; ?>>Екстра сухое</option>
                            <option value="2" <?php if ($product['wine_class'] == 2) echo ' selected="selected"'; ?>>Сухое</option>
                            <option value="3" <?php if ($product['wine_class'] == 3) echo ' selected="selected"'; ?>>Полусухое</option>
                            <option value="4" <?php if ($product['wine_class'] == 4) echo ' selected="selected"'; ?>>Полусладкое</option>
                            <option value="5" <?php if ($product['wine_class'] == 5) echo ' selected="selected"'; ?>>Сладкое</option>
                        </select>
                        
                        
                        
                        <br/><br/>
                        
                        <p>Страна Производитель</p>
                        <select class="custom-select" name="wine_category_id">
                             <option value="0" <?php if ($product['wine_category_id'] == "0") echo ' selected="selected"'; ?>>Выбор страны производителя</option>
                            <option value="1" <?php if ($product['wine_category_id'] == 1) echo ' selected="selected"'; ?>>Франция</option>
                            <option value="2" <?php if ($product['wine_category_id'] == 2) echo ' selected="selected"'; ?>>Италия</option>
                            <option value="3" <?php if ($product['wine_category_id'] == 3) echo ' selected="selected"'; ?>>Испания</option>
                            <option value="4" <?php if ($product['wine_category_id'] == 4) echo ' selected="selected"'; ?>>Германия</option>
                            <option value="5" <?php if ($product['wine_category_id'] == 5) echo ' selected="selected"'; ?>>Австрия</option>
                            <option value="6" <?php if ($product['wine_category_id'] == 6) echo ' selected="selected"'; ?>>Молдова</option>
                            <option value="7" <?php if ($product['wine_category_id'] == 7) echo ' selected="selected"'; ?>>Аргентина</option>
                            <option value="8" <?php if ($product['wine_category_id'] == 8) echo ' selected="selected"'; ?>>Новая Зеландия</option>
                            <option value="9" <?php if ($product['wine_category_id'] == 9) echo ' selected="selected"'; ?>>Чили</option>
                            <option value="10" <?php if ($product['wine_category_id'] == 10) echo ' selected="selected"'; ?>>Америка</option>
                            <option value="11" <?php if ($product['wine_category_id'] == 11) echo ' selected="selected"'; ?> >Армения</option>
                            <option value="12" <?php if ($product['wine_category_id'] == 12) echo ' selected="selected"'; ?> >Австралия</option>
                            <option value="13" <?php if ($product['wine_category_id'] == 13) echo ' selected="selected"'; ?> >Юар</option>
                            <option value="14" <?php if ($product['wine_category_id'] == 14) echo ' selected="selected"'; ?> >Украина</option>
                            <option value="15" <?php if ($product['wine_category_id'] == 15) echo ' selected="selected"'; ?> >Португалия</option>
                            <option value="16" <?php if ($product['wine_category_id'] == 16) echo ' selected="selected"'; ?> >Грузия</option>
                            <option value="17" <?php if ($product['wine_category_id'] == 17) echo ' selected="selected"'; ?> >Япония</option>
                        </select>
                        
                        <br/><br/>
                        <h3 class="title-center">Остальное</h3>
                        <p>Новинка</p>
                        <select class="custom-select" name="is_new">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select class="custom-select" name="is_recommended">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>

                        <p>Статус</p>
                        <select class="custom-select" name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        
                        <br/><br/>

<p>ПодКатегория</p>
                        <select class="custom-select" name="parent">
<option value="0">
                                        пусто
                                    </option>
                            <?php if (is_array($pod_categoriesList)): ?>
                                <?php foreach ($pod_categoriesList as $pod_category): ?>
                                    <option value="<?php echo $pod_category['id']; ?>" 
                                        <?php if ($product['parent'] == $pod_category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $pod_category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

<p>Страна,все категории кроме вина</p>
                        <select class="custom-select" name="country">
<option value="0">
                                        пусто
                                    </option>
                            <?php if (is_array($countryList)): ?>
                                <?php foreach ($countryList as $country): ?>
                                    <option value="<?php echo $country['id']; ?>" 
                                        <?php if ($product['country'] == $country['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $country['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                    </div>
                </div>
            
</div>
        </div>
    </div>
</section>


<script>
function Selected(a) {
        var label = a.value;
        if (label==1) {
            document.getElementById("info").style.display='block';
                        
          
        } else {
            document.getElementById("info").style.display='none';
           
        }
         
}
</script>



<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>