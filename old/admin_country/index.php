<?php include ROOT . '/Site/layouts/header_admin.php'; ?>

<section>
<div class="Register_shop">
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <div class="divider_n"></div>
                    <li class="active">Управление странами</li>
                </ol>
            </div>
 </div>
            <a href="/admin/country/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить страну</a>
            <br/>
            <h4 class="text-center">Список стран</h4>

            
<br/>

            
<div class="row justify-content-center">
            <table class="table-bordered table-striped table">
                <tr>
                    <th>Изображение страны</th>
                    <th>ID страны</th>
                    <th>Название страны для админки</th>
                    <th>Название для сайта</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($countryList as $category): ?>
                    <tr>
                        <td> <img src="<?php echo Category::getImage($category['id']); ?>"  width="130" height="auto" alt="" /></td>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['name_site']; ?></td>
                        <td><?php echo Category::getStatusText($category['status']); ?></td>  
                        <td><a href="/admin/country/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/country/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
           </div> 
        </div></div>
    </div>
</section>

<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>