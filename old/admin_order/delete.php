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
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Удалить заказ</li>
                </ol>
            </div>
</div>
<br/>
            <h4 class="text-center">Удалить заказ #<?php echo $id; ?></h4>

<br/>


            
<div class="row justify-content-center">
            <p>Вы действительно хотите удалить этот заказ?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>
</div>        </div>
        </div>
    </div>
</section>

<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>