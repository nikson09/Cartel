<?php include ROOT . '/Site/layouts/header_admin.php'; ?>

<section>

    <div class="Register_shop ">
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админ панель</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Управление банерами</li>
                </ol>
            </div>
 </div>
            <a href="/admin/baner/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить Банер</a>
            <br/>
            <h4 class="text-center">Список банеров</h4>

            
<br/>
<div class="baner">
  <div class="container">
    <div class="row justify-content-center">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php foreach($baners as $key => $baner) :?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ;?>" <?php if($baner['order_line'] == 1){ echo 'class="active"';} ;?>></li>
          <?php endforeach ;?>
        </ol>
        <div class="carousel-inner">
          <?php foreach($baners as $baner) :?>
          <div <?php if($baner['order_line'] == 1){ echo 'class="carousel-item active"'; } else { echo 'class="carousel-item"' ;} ;?> >
            <a href="<?php echo $baner['href'] ;?>"><img  class="d-block w-100 lazy" src="<?php echo Baner::getImage($baner['id']); ?>"></a>
          </div>
          <?php endforeach ;?>
      </div>
    </div>
   </div>
  </div>
</div>
<br>
            
<div class="row justify-content-center">
            <table id='empTable' class="table-bordered table-striped table display dataTable">
            <thead>
                <tr>
                    <th>Изображение банера</th>
                    <th>ID банера</th>
                    <th>Ссылка</th>
                    <th>Порядковый номер</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            </table>
  </div></div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
       $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':'/admin/getBaners'
          },
          'columns': [
             { data: 'image' },
             { data: 'id' },
             { data: 'href' },
             { data: 'order' },
             { data: 'update' },
             { data: 'delete' },
          ]
       });
    });
</script>
<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>
