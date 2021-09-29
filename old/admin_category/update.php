<?php include ROOT . '/Site/layouts/header_admin.php'; ?>

<section>
<div class="Register_shop container">
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <div class="divider_n"></div>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>
</div>
 <br/>
            <h4 class="text-center">Редактировать категорию "<?php echo $category['name']; ?>"</h4>

           
<br/>


            
<div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>">
                        
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
                        </select>

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div> </div>
        </div>
    </div>
  </div>
</section>

<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>
