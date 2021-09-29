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
                    <li><a href="/admin/order">Управление категориями</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>
  </div>
<br/>   
            <h4 class="text-center">Добавить новую категорию</h4>

            <br/>
<div class="row justify-content-center">
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        
                        <p>Позиция Категории</p>
                        <input type="text" name="id" placeholder="" value="">
                        
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">

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
    </div>
</section>

<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>