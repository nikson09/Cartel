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
                    <li class="active">Управление товарами</li>
                </ol>
            </div>
 </div>
            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
            <br/>
            <h4 class="text-center">Список товаров</h4>

            
<br/>


            
<div class="row justify-content-center">
            <table id='empTable' class="table-bordered table-striped table display dataTable">
            <thead>
                <tr>
                    <th>Изображение товара</th>
                    <th>ID товара</th>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Цена</th>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':'/admin/product/get'
          },
          'columns': [
             { data: 'image' },
             { data: 'id' },
             { data: 'code' },
             { data: 'name_site' },
             { data: 'price' },
             { data: 'update' },
             { data: 'delete' },
          ]
       });
    });
</script>
<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>
