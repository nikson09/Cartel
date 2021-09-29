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
                    <li class="active">Добавить новую страну </li>
                </ol>
            </div>


            
 </div>
            <br/><h4 class="text-center">Добавить новую страну </h4>
<div class="row justify-content-center">
<br/>
<br/>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <p>id страны</p>
                        <input type="text" name="id" placeholder="" value="">
                        
                        <p>Название для админ панели</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Название страны для сайта</p>
                        <input type="text" name="name_site" placeholder="" value="">

                        <p>К какой категории привязана</p>

                        <select class="custom-select" name="parent">
<option value="0">
                                        пусто
                                    </option>
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                      <p>Изображение страны</p>
                        <input class="form-control" type="file" name="image" placeholder="" value="">


                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>
                        
                        

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
 </div>

        </div> 
    </div>
</section>

<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>