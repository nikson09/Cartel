<?php include ROOT . '/Site/layouts/header_admin.php'; ?>

<section>
<div class="Register_shop container">
    <div class="container">
        <div class="row ">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <div class="divider_n"></div>
                    <li><a href="/admin/country">Управление странами</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Редактировать страну</li>
                </ol>
            </div>

</div><br/>
            <h4 class="text-center">Редактировать категорию "<?php echo $country['name']; ?>"</h4>

            <br/>
<div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название для Админки</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $country['name']; ?>">

                        <p>Название для сайта</p>
                        <input type="text" name="name_site" placeholder="" value="<?php echo $country['name_site']; ?>">
                        
<p>К какой категории привязана страна</p>
                          <select class="custom-select" name="parent">
<option value="0">
                                        пусто
                                    </option>
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $ascategory): ?>
                                    <option value="<?php echo $ascategory['id']; ?>" 
                                        <?php if ($country['parent'] == $ascategory['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $ascategory['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                           </select>


<p>Изображение страны</p>
                        <img src="<?php echo Category::getImage($country['id']); ?>"  width="270" height="auto" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $country['image']; ?>">

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($country['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($country['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
                        </select>


                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div></div>
    </div>
</section>
</div>
<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>
