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
                      <li class="active">Управление категорией продукты</li>
                  </ol>
              </div>
      </div>
          <a data-toggle="modal" data-target="#create_product" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить Продукты</a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category_modal">Категории Продуктов</button>
          <br/>
          <h4 class="text-center">Список Продуктов</h4>
      <br/>
      <br>
      <div class="row justify-content-center">
          <table id='empTable' class="table-bordered table-striped table display dataTable">
          <thead>
              <tr>
                  <th>Изображение продукта</th>
                  <th>Порядковый номер</th>
                  <th>Артикул</th>
                  <th>Название</th>
                  <th>Цена</th>
                  <th>Редактировать</th>
                  <th>Удалить</th>
              </tr>
          </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="create_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить продукт</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="upload_image_form" action="javascript:void(0)">
          <div class="row">
            <div class="col-lg-5">
              <div class="product__details__pic">
                <label for="formGroupExampleInput" class="text-center">Изображение товара</label>
                <div style="margin-bottom: 5px" class="product__details__slider__content">
                  <div class='row justify-content-center'>
                    <img data-hash="product-1" id="myImg" src="https://www.stevenstaekwondo.com/wp-content/uploads/2017/04/default-image-620x600.jpg" alt="" style='max-width: 150px;max-height: max-content;' class="img-thumbnail" multiple="multiple" accept=".txt,image/*">
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Загрузить</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"></label>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-7">
                <div class="form-group">
                  <label for="name">Название товара для сайта</label>
                  <input type="text" class="form-control" id="name_site" name="name_site" placeholder="введите название товара для сайта">
                </div>
                <div class="form-group">
                  <label for="name">Название товара для гугла</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="введите название товара для сайта">
                </div>
                <div class="form-group">
                  <label for="code">Артикул</label>
                  <input class="form-control" type="text" id="code" name="code" placeholder="введите артикул">
                </div>
                <div class="form-group">
                  <label for="code_go">Штрихкод</label>
                  <input class="form-control" type="text" id="code_go" name="code_go" placeholder="введите штрихкод">
                </div>
                <h3 class="text-center">Скидочная система</h3>
                <div class="form-group">
                  <label for="discount">Включить скидку?</label>
                  <select class="custom-select" id="discount" name="discount" onChange="Selected(this)">
                      <option onchange="document.getElementById('info').style.display= 'none';" value="0" selected="selected">Нет</option>
                      <option onchange="document.getElementById('info').style.display='block';" value="1">Да</option>
                  </select>
                </div>
                <div id="info" class="price_discount" style="display: none;">
                  <div class="form-group">
                    <label for="discount_num">Процент скидки, -(?)%</label>
                    <input class="form-control" type="text" id="discount_num" name="discount_num" placeholder="процент скидки" value="">
                  </div>
                  <div class="form-group">
                    <label for="last_price">Стоимость без скидки, грн</label>
                    <input class="form-control" type="text" id="last_price" name="last_price" placeholder="стоимость без скидки" value="">
                  </div>
                  <div class="form-group">
                    <label for="discount_date">Дата скидки,("До (31.12)")</label>
                    <input class="form-control" type="text" id="discount_date" name="discount_date" placeholder="дата скидки">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price">Текущая стоимость, грн</label>
                  <input class="form-control" type="text" id="price" name="price" placeholder="введите стоимость">
                </div>
                <div class="form-group">
                  <label for="category_id">Категория</label>
                  <select class="custom-select" id="category_id" name="category_id">
                      <?php if (is_array($categoriesList)): ?>
                          <?php foreach ($categoriesList as $category): ?>
                              <option value="<?php echo $category['id']; ?>">
                                  <?php echo $category['name']; ?>
                              </option>
                          <?php endforeach; ?>
                      <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="brand">Производитель</label>
                  <input class="form-control" type="text" id="brand" name="brand" placeholder="производитель">
                </div>
                <div class="form-group">
                  <label for="size">Обьем Продукта,г</label>
                  <input class="form-control" type="text" id="size" name="size" placeholder="размер Бутылки">
                </div>
                <div class="form-group">
                  <label for="description">Детальное описание</label>
                  <textarea class="form-control" type="text" id="description" name="description" placeholder="детальное описание"></textarea>
                </div>
                <div class="form-group">
                  <label for="availability">Наличие на складе</label>
                  <select class="custom-select" id="availability"  name="availability">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="is_new">Новинка</label>
                  <select class="custom-select" id="is_new"  name="is_new">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="is_recommended">Рекомендуемые</label>
                  <select class="custom-select" id="is_recommended"  name="is_recommended">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">Статус</label>
                  <select class="custom-select" id="status"  name="status">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="parent">Подкатегория</label>
                  <select class="custom-select" id="parent" name="parent">
                      <option value="0">
                          пусто
                      </option>
                      <?php if (is_array($pod_categoriesList)): ?>
                          <?php foreach ($pod_categoriesList as $pod_category): ?>
                              <option value="<?php echo $pod_category['id']; ?>">
                                  <?php echo $pod_category['name']; ?>
                              </option>
                          <?php endforeach; ?>
                      <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="country">Страны</label>
                  <select class="custom-select" id="country" name="country">
                    <option >
                        пусто
                    </option>
                    <?php if (is_array($countryList)): ?>
                        <?php foreach ($countryList as $country): ?>
                            <option value="<?php echo $country['id']; ?>">
                                <?php echo $country['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
               </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                  <button type="button" class="btn btn-primary" onClick="addProduct()">Добавить</button>
                </div>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать продукт</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="upload_image_form_s" action="javascript:void(0)">
          <div class="row">
            <div class="col-lg-5">
              <div class="product__details__pic">
                <label for="formGroupExampleInput" class="text-center">Изображение товара</label>
                <div style="margin-bottom: 5px" class="product__details__slider__content">
                  <div class='row justify-content-center'>
                    <img data-hash="product-2" id="myImgS" src="https://www.stevenstaekwondo.com/wp-content/uploads/2017/04/default-image-620x600.jpg" alt="" style='max-width: 150px;max-height: max-content;' class="img-thumbnail" multiple="multiple" accept=".txt,image/*">
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Загрузить</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image_s" class="custom-file-input" id="inputGroupFile02"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile02"></label>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-7">
                <input type="hidden" class="form-control" id="id" name="id" val=''>
                <div class="form-group">
                  <label for="name">Название товара для сайта</label>
                  <input type="text" class="form-control" id="name_site_s" name="name_site" placeholder="введите название товара для сайта">
                </div>
                <div class="form-group">
                  <label for="name">Название товара для гугла</label>
                  <input type="text" class="form-control" id="name_s" name="name" placeholder="введите название товара для сайта">
                </div>
                <div class="form-group">
                  <label for="code">Артикул</label>
                  <input class="form-control" type="text" id="code_s" name="code" placeholder="введите артикул">
                </div>
                <div class="form-group">
                  <label for="code_go">Штрихкод</label>
                  <input class="form-control" type="text" id="code_go_s" name="code_go" placeholder="введите штрихкод">
                </div>
                <h3 class="text-center">Скидочная система</h3>
                <div class="form-group">
                  <label for="discount">Включить скидку?</label>
                  <select class="custom-select" id="discount_s" name="discount" onChange="Selected_s(this)">
                      <option onchange="document.getElementById('info_s').style.display= 'none';" value="0" selected="selected">Нет</option>
                      <option onchange="document.getElementById('info_s').style.display='block';" value="1">Да</option>
                  </select>
                </div>
                <div id="info_s" class="price_discount" style="display: none;">
                  <div class="form-group">
                    <label for="discount_num">Процент скидки, -(?)%</label>
                    <input class="form-control" type="text" id="discount_num_s" name="discount_num" placeholder="процент скидки" value="">
                  </div>
                  <div class="form-group">
                    <label for="last_price">Стоимость без скидки, грн</label>
                    <input class="form-control" type="text" id="last_price_s" name="last_price" placeholder="стоимость без скидки" value="">
                  </div>
                  <div class="form-group">
                    <label for="discount_date">Дата скидки,("До (31.12)")</label>
                    <input class="form-control" type="text" id="discount_date_s" name="discount_date" placeholder="дата скидки">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price">Текущая стоимость, грн</label>
                  <input class="form-control" type="text" id="price_s" name="price" placeholder="введите стоимость">
                </div>
                <div class="form-group">
                  <label for="category_id">Категория</label>
                  <select class="custom-select" id="category_id_s" name="category_id">
                      <?php if (is_array($categoriesList)): ?>
                          <?php foreach ($categoriesList as $category): ?>
                              <option value="<?php echo $category['id']; ?>">
                                  <?php echo $category['name']; ?>
                              </option>
                          <?php endforeach; ?>
                      <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="brand">Производитель</label>
                  <input class="form-control" type="text" id="brand_s" name="brand" placeholder="производитель">
                </div>
                <div class="form-group">
                  <label for="size">Обьем продукта,г</label>
                  <input class="form-control" type="text" id="size_s" name="size" placeholder="размер Бутылки">
                </div>
                <div class="form-group">
                  <label for="description">Детальное описание</label>
                  <textarea class="form-control" type="text" id="description_s" name="description" placeholder="детальное описание"></textarea>
                </div>
                <div class="form-group">
                  <label for="availability">Наличие на складе</label>
                  <select class="custom-select" id="availability_s"  name="availability">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="is_new">Новинка</label>
                  <select class="custom-select" id="is_new_s"  name="is_new">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="is_recommended">Рекомендуемые</label>
                  <select class="custom-select" id="is_recommended_s"  name="is_recommended">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">Статус</label>
                  <select class="custom-select" id="status_s"  name="status">
                      <option value="1" selected="selected">Да</option>
                      <option value="0">Нет</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="parent">Подкатегория</label>
                  <select class="custom-select" id="parent_s" name="parent">
                      <option value="0">
                          пусто
                      </option>
                      <?php if (is_array($pod_categoriesList)): ?>
                          <?php foreach ($pod_categoriesList as $pod_category): ?>
                              <option value="<?php echo $pod_category['id']; ?>">
                                  <?php echo $pod_category['name']; ?>
                              </option>
                          <?php endforeach; ?>
                      <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="country_s">Страны</label>
                  <select class="custom-select" id="country_s" name="country_s">
                    <option >
                        пусто
                    </option>
                    <?php if (is_array($countryList)): ?>
                        <?php foreach ($countryList as $country): ?>
                            <option value="<?php echo $country['id']; ?>">
                                <?php echo $country['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
               </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" onClick="updateProduct()">Редактировать</button>
              </div>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="category_modal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Категории продуктов</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <a style="margin-bottom: 10px" data-toggle="modal" data-target="#create_category" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>
      <table id='category_table' class="table-bordered table-striped table display dataTable">
      <thead>
          <tr>
              <th>Изображение категории</th>
              <th>Порядковый номер</th>
              <th>Название категории</th>
              <th>Редактировать</th>
              <th>Удалить</th>
          </tr>
      </thead>
      </table>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="create_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить категорию</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="upload_image_form_category" action="javascript:void(0)">
          <div class="row">
            <div class="col-lg-5">
              <div class="product__details__pic">
                <label for="formGroupExampleInput" class="text-center">Изображение категории</label>
                <div style="margin-bottom: 5px" class="product__details__slider__content">
                  <div class='row justify-content-center'>
                    <img data-hash="product-2" id="myImgSS" src="https://www.stevenstaekwondo.com/wp-content/uploads/2017/04/default-image-620x600.jpg" alt="" style='max-width: 150px;max-height: max-content;' class="img-thumbnail" multiple="multiple" accept=".txt,image/*">
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Загрузить</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image_category" class="custom-file-input" id="inputGroupFile03"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile03"></label>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-7">
                <div class="form-group">
                  <label for="phone_number">Название категории</label>
                  <input type="text" class="form-control" id="name_category"  placeholder="Введите название категории">
                </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" onClick="addCategory()">Добавить</button>
              </div>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать категорию</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="upload_image_form_category_s" action="javascript:void(0)">
          <div class="row">
            <div class="col-lg-5">
              <div class="product__details__pic">
                <label for="formGroupExampleInput" class="text-center">Изображение категории</label>
                <div style="margin-bottom: 5px" class="product__details__slider__content">
                  <div class='row justify-content-center'>
                    <img data-hash="product-2" id="myImgSSS" src="https://www.stevenstaekwondo.com/wp-content/uploads/2017/04/default-image-620x600.jpg" alt="" style='max-width: 150px;max-height: max-content;' class="img-thumbnail" multiple="multiple" accept=".txt,image/*">
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Загрузить</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image_category_s" class="custom-file-input" id="inputGroupFile04"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile04"></label>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-7">
                <div class="form-group">
                  <label for="phone_number">Название Категории</label>
                  <input type="text" class="form-control" id="name_category_s"  placeholder="Введите название категории">
                  <input type='hidden' id='update_category_id' value=''>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                  <button type="button" class="btn btn-primary" onClick="updateCategory()">Редактировать</button>
                </div>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</section>
<script type="text/javascript">
    $(document).ready(function(){
      productTable();
      categoriesTable();
    });
    var image;
    window.addEventListener('load', function() {
      document.querySelector('input[name="image"]').addEventListener('change', function() {
          if (this.files && this.files[0]) {
              var img = document.querySelector('#myImg');
              img.src = URL.createObjectURL(this.files[0]);
              $image = this.files;
          }
      });
    });
    function addProduct()
    {
      var name_site = $('#name_site').val();
      var name = $('#name').val();
      var code = $('#code').val();
      var code_go = $('#code_go').val();
      var discount = $('#discount').val();
      var discount_num = $('#discount_num').val();
      var last_price = $('#last_price').val();
      var discount_date = $('#discount_date').val();
      var description = $('#description').val();
      var price = $('#price').val();
      var category_id = $('#category_id').val();
      var brand = $('#brand').val();
      var strength = $('#strength').val();
      var size = $('#size').val();
      var availability = $('#availability').val();
      var is_new = $('#is_new').val();
      var is_recommended = $('#is_recommended').val();
      var status = $('#status').val();
      var parent = $('#parent').val();
      var country = $('#country').val();

      var file_data = $image[0];
      var formData = new FormData(); 
      formData.append('itempic', file_data);
      formData.append('name_site', name_site);
      formData.append('name', name);
      formData.append('code', code);
      formData.append('code_go', code_go);
      formData.append('discount', discount);
      formData.append('discount_num', discount_num);
      formData.append('last_price', last_price);
      formData.append('discount_date', discount_date);
      formData.append('description', description);
      formData.append('price', price);
      formData.append('category_id', category_id);
      formData.append('brand', brand);
      formData.append('size', size);
      formData.append('availability', availability);
      formData.append('is_new', is_new);
      formData.append('is_recommended', is_recommended);
      formData.append('status', status);
      formData.append('parent', parent);
      formData.append('country', country);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $.ajax({
        type:'POST',
        url:'/admin/caterProducts/product/create',
        data:formData,
            processData: false,
            contentType: false,
            dataType: "json",
        success:function(data){
          alert('Продукт был сохранен');
          var name_site = $('#name_site').val(null);
          var name = $('#name').val(null);
          var code = $('#code').val(null);
          var code_go = $('#code_go').val(null);
          var discount = $('#discount').val(0);
          var discount_num = $('#discount_num').val(null);
          var last_price = $('#last_price').val(null);
          var discount_date = $('#discount_date').val(null);
          var price = $('#price').val(null);
          var category_id = $('#category_id').val(null);
          var brand = $('#brand').val(null);
          var size = $('#size').val(null);
          var discount_date = $('#discount_date').val(null);
          var availability = $('#availability').val(1);
          var is_new = $('#is_new').val(1);
          var is_recommended = $('#is_recommended').val(1);
          var status = $('#status').val(1);
          var parent = $('#parent').val(0);
          var country = $('#country').val(0);
          $('#create_product').modal('hide');
          $('#empTable').DataTable().draw();
              var img = document.querySelector('#myImg');
              img.src = $('#src').attr('data-src');
        },
        error:function(data){
          $.each(data.responseJSON.errors, function (i, error) {
              alert(error[0]);
          });

        }
      });
    }

    var $image_s;
    window.addEventListener('load', function() {
      document.querySelector('input[name="image_s"]').addEventListener('change', function() {
          if (this.files && this.files[0]) {
              var image = document.querySelector('#myImgS');
              image.src = URL.createObjectURL(this.files[0]);
              $image_s = this.files;
          }
      });
    });

    function updateProduct()
    {
      if($.trim($image_s)){
        var name_site_s = $('#name_site_s').val();
        var name_s = $('#name_s').val();
        var code_s = $('#code_s').val();
        var code_go_s = $('#code_go_s').val();
        var discount_s = $('#discount_s').val();
        var discount_num_s = $('#discount_num_s').val();
        var last_price_s = $('#last_price_s').val();
        var discount_date_s = $('#discount_date_s').val();
        var description_s = $('#description_s').val();
        var price_s = $('#price_s').val();
        var category_id_s = $('#category_id_s').val();
        var brand_s = $('#brand_s').val();
        var size_s = $('#size_s').val();
        var availability_s = $('#availability_s').val();
        var is_new_s = $('#is_new_s').val();
        var is_recommended_s = $('#is_recommended_s').val();
        var status_s = $('#status_s').val();
        var parent_s = $('#parent_s').val();
        var country_s = $('#country_s').val();
        var id = $('#id').val();
        var file_data_s = $image_s[0];
        var formData = new FormData(); 
        formData.append('itempic', file_data_s);
        formData.append('name_site', name_site_s);
        formData.append('name', name_s);
        formData.append('code', code_s);
        formData.append('code_go', code_go_s);
        formData.append('discount', discount_s);
        formData.append('discount_num', discount_num_s);
        formData.append('last_price', last_price_s);
        formData.append('discount_date', discount_date_s);
        formData.append('description', description_s);
        formData.append('price', price_s);
        formData.append('category_id', category_id_s);
        formData.append('brand', brand_s);
        formData.append('size', size_s);
        formData.append('availability', availability_s);
        formData.append('is_new', is_new_s);
        formData.append('is_recommended', is_recommended_s);
        formData.append('status', status_s);
        formData.append('parent', parent_s);
        formData.append('country', country_s);
      } else {
        var name_site_s = $('#name_site_s').val();
        var name_s = $('#name_s').val();
        var code_s = $('#code_s').val();
        var code_go_s = $('#code_go_s').val();
        var discount_s = $('#discount_s').val();
        var discount_num_s = $('#discount_num_s').val();
        var last_price_s = $('#last_price_s').val();
        var discount_date_s = $('#discount_date_s').val();
        var description_s = $('#description_s').val();
        var price_s = $('#price_s').val();
        var category_id_s = $('#category_id_s').val();
        var brand_s = $('#brand_s').val();
        var size_s = $('#size_s').val();
        var availability_s = $('#availability_s').val();
        var is_new_s = $('#is_new_s').val();
        var is_recommended_s = $('#is_recommended_s').val();
        var status_s = $('#status_s').val();
        var parent_s = $('#parent_s').val();
        var country_s = $('#country_s').val();
        var id = $('#id').val();
        var formData = new FormData(); 
        formData.append('name_site', name_site_s);
        formData.append('name', name_s);
        formData.append('code', code_s);
        formData.append('code_go', code_go_s);
        formData.append('discount', discount_s);
        formData.append('discount_num', discount_num_s);
        formData.append('last_price', last_price_s);
        formData.append('discount_date', discount_date_s);
        formData.append('description', description_s);
        formData.append('price', price_s);
        formData.append('category_id', category_id_s);
        formData.append('brand', brand_s);
        formData.append('size', size_s);
        formData.append('availability', availability_s);
        formData.append('is_new', is_new_s);
        formData.append('is_recommended', is_recommended_s);
        formData.append('status', status_s);
        formData.append('parent', parent_s);
        formData.append('country', country_s);
      }
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $.ajax({
        type:'POST',
        url:'/admin/caterProducts/product/update/'+id,
        data:formData,
            processData: false,
            contentType: false,
            dataType: "json",
        success:function(data){
          alert('Продукт был редактирован');
          $('#edit_product').modal('hide');
          $('#empTable').DataTable().draw();
        },
        error:function(data){
          $.each(data.responseJSON.errors, function (i, error) {
              alert(error[0]);
          });

        }
      });
    }

    function openEditProduct(id)
    {
      $('#edit_product').modal('show');
        var post = $.ajax({
            method: 'POST',
            url: "/admin/caterProducts/getProduct/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                  var image       = $('#myImgS').attr('src','/upload/images/products/'+id+'.jpg');
                  var name_site_s = $('#name_site_s').val(result.name_site_s);
                  var name_s = $('#name_s').val(result.name_s);
                  var code_s = $('#code_s').val(result.code_s);
                  var code_go_s = $('#code_go_s').val(result.code_go_s);
                  var discount_s = $('#discount_s').val(result.discount_s);
                  if(parseInt(result.discount_s) == 1){
                    $('#info_s').show();
                  }
                  var discount_num_s = $('#discount_num_s').val(result.discount_num_s);
                  var last_price_s = $('#last_price_s').val(result.last_price_s);
                  var discount_date_s = $('#discount_date_s').val(result.discount_date_s);
                  var description_s = $('#description_s').val(result.description_s);
                  var price_s = $('#price_s').val(result.price_s);
                  var category_id_s = $('#category_id_s').val(result.category_id_s);
                  var brand_s = $('#brand_s').val(result.brand_s);
                  var size_s = $('#size_s').val(result.size_s);
                  var availability_s = $('#availability_s').val(result.availability_s);
                  var is_new_s = $('#is_new_s').val(result.is_new_s);
                  var is_recommended_s = $('#is_recommended_s').val(result.is_recommended_s);
                  var status_s = $('#status_s').val(result.status_s);
                  var parent_s = $('#parent_s').val(result.parent_s);
                  var country_s = $('#country_s').val(result.country_s);
                  $('#id').val(id);
                }
            }
        });
    }

    function deleteProduct(id)
    {
        var post = $.ajax({
            method: 'POST',
            data : {
              
            },
            url: "/admin/caterProducts/delete/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                    alert('Продукт был удален');
                    $('#empTable').DataTable().draw();
                }
            }
        });
    }

    function productTable()
    {
       $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':'/admin/caterProducts/table'
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
    }

    function categoriesTable()
    {
       $('#category_table').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':'/admin/caterProducts/categoryTable'
          },
          'columns': [
             { data: 'image' },
             { data: 'id' },
             { data: 'name' },
             { data: 'update' },
             { data: 'delete' },
          ]
       });
    }

    window.addEventListener('load', function() {
      document.querySelector('input[name="image_category"]').addEventListener('change', function() {
          if (this.files && this.files[0]) {
              var imge = document.querySelector('#myImgSS');
              imge.src = URL.createObjectURL(this.files[0]);
              $images = this.files;
          }
      });
    });

    function addCategory()
    {
      var name_category = $('#name_category').val();
      var file_data = $images[0];
      var formData = new FormData(); 
      formData.append('itempic', file_data);
      formData.append('name_category', name_category);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $.ajax({
        type:'POST',
        url:'/admin/caterProducts/createCategory',
        data:formData,
            processData: false,
            contentType: false,
            dataType: "json",
        success:function(data){
            alert('Категория был сохранена');
            var name_category = $('#name_category').val(null);
            $('#create_category').modal('hide');
            $('#category_table').DataTable().draw();
		location.reload();
        },
        error:function(data){
          $.each(data.responseJSON.errors, function (i, error) {
              alert(error[0]);
          });

        }
      });
    }

    function openEditCategory(id)
    {
      $('#edit_category').modal('show');
        var post = $.ajax({
            method: 'POST',
            url: "/admin/caterProducts/getCategory/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                  var image  = $('#myImgSSS').attr('src','/upload/images/categories/'+id+'.jpg');
                  var update = $('#update_category_id').val(id);
                  var name_category = $('#name_category_s').val(result.name_group);
                }
            }
        });
    }

    var $image_ss;
    window.addEventListener('load', function() {
      document.querySelector('input[name="image_category_s"]').addEventListener('change', function() {
          if (this.files && this.files[0]) {
              var imagese = document.querySelector('#myImgSSS');
              imagese.src = URL.createObjectURL(this.files[0]);
              $image_ss = this.files;
          }
      });
    });

    function updateCategory()
    {
      if($.trim($image_ss)){
        var id = $('#update_category_id').val();
        var name_category_s = $('#name_category_s').val();
        var file_data_s = $image_ss[0];
        var formData = new FormData(); 
        formData.append('itempic', file_data_s);
        formData.append('name_category', name_category_s);
      } else {
        var id = $('#update_category_id').val();
        var name_category_s = $('#name_category_s').val();
        var formData = new FormData(); 
        formData.append('name_category', name_category_s);
      }
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $.ajax({
        type:'POST',
        url:'/admin/caterProducts/updateCategory/'+ id,
        data:formData,
            processData: false,
            contentType: false,
            dataType: "json",
        success:function(data){
            alert('Категория была отредактирована');
            var name_category = $('#name_category_s').val(null);
            $('#edit_category').modal('hide');
            $('#category_table').DataTable().draw();
		location.reload();
        },
        error:function(data){
          $.each(data.responseJSON.errors, function (i, error) {
              alert(error[0]);
          });

        }
      });
    }

    function deleteCategory(id)
    {
        var post = $.ajax({
            method: 'POST',
            data : {
              
            },
            url: "/admin/caterProducts/deleteCategory/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                    alert('Категория была удалена');
                    $('#category_table').DataTable().draw();
			location.reload();
                }
            }
        });
    }

  function Selected(a) {
          var label = a.value;
          if (label==1) {
              document.getElementById("info").style.display='block';
                          
            
          } else {
              document.getElementById("info").style.display='none';
             
          }
           
  }
  function Selected_s(a) {
          var label = a.value;
          if (label==1) {
              document.getElementById("info_s").style.display='block';
                          
            
          } else {
              document.getElementById("info_s").style.display='none';
             
          }
           
  }
</script>

<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>
