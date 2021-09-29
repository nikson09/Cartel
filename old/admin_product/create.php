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
            <h4 class=" text-center">Добавить новый товар</h4>
<h6 class=" text-center">(Товар не добавить если не записать все данные до изображения)</h6>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название товара для сайта</p>
                        <input class="form-control" type="text" name="name_site" placeholder="Название товара для сайта....." value="">
                        
                        <p>Название товара для гугла</p>
                        <input class="form-control" type="text" name="name" placeholder="Название товара для гугла....." value="">

                        <p>Артикул</p>
                        <input class="form-control" type="text" name="code" placeholder="Артикул...." value="">

                        <p>Штрихкод</p>
                        <input class="form-control" type="text" name="code_go" placeholder="Артикул...." value="">




<h3 class=text-center">Скидочная система</h3>


 <p>Включить скидку?</p>
                        <select class="custom-select" name="discount" onChange="Selected(this)">
                            <option onchange="document.getElementById('info').style.display= 'none';" value="0" selected="selected">Нет</option>
                            <option onchange="document.getElementById('info').style.display='block';" value="1">Да</option>
                        </select>

                        <br/><br/>
<div id="info" class="price_discount">
 <p>Процент скидки, -(?)%</p>
                        <input class="form-control" type="text" name="discount_num" placeholder="Процент скидки..." value="">
<p>Стоимость без скидки, грн</p>
                        <input class="form-control" type="text" name="last_price" placeholder="Стоимость без скидки..." value="">
<p>Дата скидки,("До (31.12)")</p>
                        <input class="form-control" type="text" name="discount_date" placeholder="Стоимость без скидки..." value="">
                   
</div>


                        <p>Текущая стоимость, грн</p>
                        <input class="form-control" type="text" name="price" placeholder="Стоимость..." value="">

                        <p>Категория</p>
                        <select class="custom-select" name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Производитель</p>
                        <input class="form-control" type="text" name="brand" placeholder="Производитель...." value="">
                        
                        <p>Процент Алкоголя,%</p>
                        <input class="form-control" type="text" name="strength" placeholder="Процент Алкоголя...." value="">
                        <p>Обьем Бутылки,л</p>
                        <input class="form-control" type="text" name="size" placeholder="Размер Бутылки....." value="">
                        
                        <p>Изображение товара</p>
                        <input class="form-control" type="file" name="image" placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea class="text-form form-control" placeholder="Детальное описание....." name="description"></textarea>

                        <br/><br/>

                        <p>Наличие на складе</p>
                        <select class="custom-select"  name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>
<h3 class="title-center">Пункты только для вина</h3>
                        
                        <p>Цвет Вина</p>
                        
                        <select class="custom-select" name="wine_color">
                             <option value="0" >Выбор цвета</option>
                            <option value="1" >Белое</option>
                            <option value="2" >Красное</option>
                            <option value="3" >Розовое</option>
                        </select>
                        
                        
                        <br/><br/>
                        
                        <p>Тип Вина</p>
                        <select class="custom-select" name="wine_class">
                             <option value="0" >Выбор типа вина</option>
                            <option value="1" >Екстра сухое</option>
                            <option value="2" >Сухое</option>
                            <option value="3" >Полусухое</option>
                            <option value="4" >Полусладкое</option>
                            <option value="5" >Сладкое</option>
                        </select>
                        
                        
                        
                        <br/><br/>
                        
                        <p>Страна Производитель</p>
                        <select class="custom-select" name="wine_category_id">
                             <option value="0" >Выбор страны производителя</option>
                            <option value="1" >Франция</option>
                            <option value="2" >Италия</option>
                            <option value="3" >Испания</option>
                            <option value="4" >Германия</option>
                            <option value="5" >Австрия</option>
                            <option value="6" >Молдова</option>
                            <option value="7" >Аргентина</option>
                            <option value="8" >Новая Зеландия</option>
                            <option value="9" >Чили</option>
                            <option value="10" >Америка</option>
                            <option value="11" >Армения</option>
                            <option value="12" >Австралия</option>
                            <option value="13" >Юар</option>
                            <option value="14" >Украина</option>
                            <option value="15" >Португалия</option>
                            <option value="16" >Грузия</option>
                            <option value="17" >Япония</option>

                        </select>
                        
                        <br/><br/>
                        
                        <h3 class="title-center">Остальное</h3>
                        
                        <p>Новинка</p>
                        <select class="custom-select" name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select class="custom-select" name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select class="custom-select" name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br/><br/>

<p>ПодКатегория</p>
                        <select class="custom-select" name="parent">
<option value="0">
                                        пусто
                                    </option>
                            <?php if (is_array($pod_categoriesList)): ?>
                                <?php foreach ($pod_categoriesList as $pod_category): ?>
                                    <option value="<?php echo $pod_category['id']; ?>">
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
                                    <option value="<?php echo $country['id']; ?>">
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
