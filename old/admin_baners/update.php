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
            <h4>Редактировать банер #<?php echo $id; ?></h4>
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Изображение товара</p>
                        <img src="<?php echo Baner::getImage($baner['id']); ?>"  width="270" height="auto" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $baner['image']; ?>">
                        <br><br>

                        <p>На что ссылается банер</p>
                        <input class="form-control" type="text" name="href" placeholder="Ссылка банера...." value="<?php echo $baner['href']; ?>">
                        <br>
                      
                        <p>Порядковый номер банера</p>
                        <input class="form-control" type="text" name="order_line" placeholder="Порядковый номер...." value="<?php echo $baner['order_line']; ?>">
                        
                        <br>
                        <input type="submit" name="submit" class="btn-success" value="Сохранить">
                        
                        
                        
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