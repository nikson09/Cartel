<?php include ROOT . '/Site/layouts/header_admin.php'; ?>

<section>
    <div class="Register_shop container">
       

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <div class="divider_n"></div>
                    <li><a href="/admin/baners">Управление банерами</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Редактировать банер</li>
                </ol>
            </div>

<div class="row justify-content-center">
    <div class="col-4">
            <h4 class=" text-center">Добавить новый банер</h4>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Изображение товара</p>
                        <input class="form-control" type="file" name="image" placeholder="" value="">
                        <br>
                        <p>На что ссылается банер</p>
                        <input class="form-control" type="text" name="href" placeholder="Ссылка банера....." value="">

                        <br>
                        <p>Порядковый номер банера</p>
                        <input class="form-control" type="text" name="order_line" placeholder="Порядковй номер банера...." value="">
                        <br>
                        <input type="submit" name="submit" class="btn-success text-center" value="Сохранить">
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
