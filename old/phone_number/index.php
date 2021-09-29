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
	                    <li class="active">Управление рассылками</li>
	                </ol>
	            </div>
	 		</div>
	        <a data-toggle="modal" data-target="#create_phone" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить телефон</a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#groups_modal">Группы</button>
      <div class="row ">
      <table class="table caption-top" style='display: flex;'>
                <a  href="javascript:;" onclick="getBalance()" class="btn btn-default back" style=''><i class="fa fa-refresh"></i> Обновить баланс</a>
        <thead>
          <tr>
            <th scope="col">Баланс</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th id="balance" scope="row">0 смс</th>
          </tr>
        </tbody>
      </table>
      </div>
	        <a data-toggle="modal" style="float:right;" data-target="#sendSms" href="javascript:;" class="btn btn-default back"><i class="fa fa-plus"></i> Отправить рассылку</a>
	        <br/>
	        <h4 class="text-center">Список телефонов</h4>
			<br/>
			<br>
			<div class="row justify-content-center">
			    <table id='empTable' class="table-bordered table-striped table display dataTable">
			    <thead>
			        <tr>
			        	<th>Порядковый номер</th>
			            <th>Телефон</th>
			            <th>Группа</th>
			            <th>Описание</th>
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
<div class="modal fade" id="create_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить телефон</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
		    <label for="phone_number">Номер телефона</label>
		    <input type="text" class="form-control" id="phone_number"  placeholder="Введите номер телефона">
		  </div>
		  <div class="form-group">
		    <label for="groupId">Группа</label>
			<select id="groupId" class="custom-select">
			  <option selected>Выберете группу</option>
			  <?php foreach ($groups as $group): ?>
			  	<option value="<?php echo $group['id'] ;?>"><?php echo $group['name'] ;?></option>
			  <?php endforeach ;?>
			</select>
		  </div>

		  <div class="form-group">
		    <label for="description">Описание</label>
		    <input type="text" class="form-control" id="description" placeholder="Введите описание">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" onClick="addPhone()">Добавить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать телефон</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
		    <label for="phone_number">Номер телефона</label>
		    <input type="text" class="form-control" id="phone_num"  placeholder="Введите номер телефона">
		  </div>
		  <div class="form-group">
		    <label for="groupId">Группа</label>
			<select id="groupIds" class="custom-select">
			  <option selected>Выберете группу</option>
			  <?php foreach ($groups as $group): ?>
			  	<option value="<?php echo $group['id'] ;?>"><?php echo $group['name'] ;?></option>
			  <?php endforeach ;?>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="description">Описание</label>
		    <input type="text" class="form-control" id="descriptiones" placeholder="Введите описание">
		    <input type='hidden' id='update_id' value=''>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" onClick="updatePhone()">Редактировать</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="groups_modal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Группы для рассылки</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <a style="margin-bottom: 10px" data-toggle="modal" data-target="#create_group" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить группу</a>
	    <table id='group_table' class="table-bordered table-striped table display dataTable">
	    <thead>
	        <tr>
	        	<th>Порядковый номер</th>
	            <th>Название группы</th>
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

<div class="modal fade" id="create_group" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить группу</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
		    <label for="phone_number">Название группы</label>
		    <input type="text" class="form-control" id="name_group"  placeholder="Введите название группы">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" onClick="addGroup()">Добавить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_group" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать группу</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
		    <label for="phone_number">Название группы</label>
		    <input type="text" class="form-control" id="name_groupes"  placeholder="Введите название группы">
		    <input type='hidden' id='update_group_id' value=''>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" onClick="updateGroup()">Редактировать</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sendSms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Отправить смс сообщение</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
		    <label for="groupIdForSms">Группа</label>
			<select id="groupIdForSms" class="custom-select">
			  <option selected>Выберете группу</option>
			  <?php foreach ($groups as $group): ?>
			  	<option value="<?php echo $group['id'] ;?>"><?php echo $group['name'] ;?></option>
			  <?php endforeach ;?>
			</select>
		  </div>

		  <div class="form-group">
		    <label for="text">Смс текст</label>
		    <input type="text-area" class="form-control" id="text" placeholder="Введите текст смс">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" onClick="send()">Отправить</button>
      </div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
    	phoneModal();
    	groupModal();
getBalance();
    });
    function addPhone()
    {
    	var phone_number = $('#phone_number').val();
    	var groupId = $('#groupId').val();
    	var description = $('#description').val();

        var post = $.ajax({
            method: 'POST',
            data : {
            	'phone_number': phone_number, 'groupId': groupId,'description': description
            },
            url: "/admin/sms/phone/create",
            success : function(result){
            	console.log(result);
                result = JSON.parse(result);
                if(result.status){
                    alert('Телефон был сохранен');
			    	var phone_number = $('#phone_number').val(null);
			    	var groupId = $('#groupId').val(null);
			    	var description = $('#description').val(null);
			    	$('#create_phone').modal('hide');
			    	$('#empTable').DataTable().draw();
                }
            }
        });
    }

    function updatePhone()
    {
    	var phone_number = $('#phone_num').val();
    	var groupId = $('#groupIds').val();
    	var description = $('#descriptiones').val();
    	var id = $('#update_id').val();
        var post = $.ajax({
            method: 'POST',
            data : {
            	'phone_number': phone_number, 'groupId': groupId,'description': description
            },
            url: "/admin/sms/phone/update/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                    alert('Телефон был редактирован');
			    	var phone_number = $('#phone_num').val(null);
			    	var groupId = $('#groupIds').val(null);
			    	var description = $('#descriptiones').val(null);
			    	$('#edit_phone').modal('hide');
			    	$('#empTable').DataTable().draw();
                }
            }
        });
    }

    function openEdit(id)
    {
    	$('#edit_phone').modal('show');
        var post = $.ajax({
            method: 'POST',
            url: "/admin/sms/phone/getPhone/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                	var update = $('#update_id').val(id);
			    	var phone_number = $('#phone_num').val(result.phone_number);
			    	var groupId = $('#groupIds').val(result.groupId);
			    	var description = $('#descriptiones').val(result.description);
			    	$('#empTable').DataTable().draw();
                }
            }
        });
    }

    function deletePhone(id)
    {
        var post = $.ajax({
            method: 'POST',
            data : {
            	
            },
            url: "/admin/sms/phone/delete/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                    alert('Телефон был удален');
			    	$('#empTable').DataTable().draw();
                }
            }
        });
    }

    function phoneModal()
    {
       $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':'/admin/sms/phone/sendPhones'
          },
          'columns': [
             { data: 'id' },
             { data: 'phone' },
             { data: 'groupId' },
             { data: 'description' },
             { data: 'update' },
             { data: 'delete' },
          ]
       });
    }

    function groupModal()
    {
       $('#group_table').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':'/admin/sms/sendGroups'
          },
          'columns': [
             { data: 'id' },
             { data: 'name' },
             { data: 'update' },
             { data: 'delete' },
          ]
       });
    }

    function addGroup()
    {
    	var name_group = $('#name_group').val();

        var post = $.ajax({
            method: 'POST',
            data : {
            	'name': name_group
            },
            url: "/admin/sms/createGroup",
            success : function(result){
            	console.log(result);
                result = JSON.parse(result);
                if(result.status){
                    alert('Группа была сохранена');
			    	var name_group = $('#name_group').val(null);
			    	$('#create_group').modal('hide');
			    	$('#group_table').DataTable().draw();
				location.reload();

                }
            }
        });
    }

    function openEditGroup(id)
    {
    	$('#edit_group').modal('show');
        var post = $.ajax({
            method: 'POST',
            url: "/admin/sms/getGroup/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                	var update = $('#update_group_id').val(id);
			    	var name_group = $('#name_groupes').val(result.name_group);
			    	$('#group_table').DataTable().draw();
                }
            }
        });
    }

    function updateGroup()
    {
    	var name_group = $('#name_groupes').val();
    	var id = $('#update_group_id').val();
        var post = $.ajax({
            method: 'POST',
            data : {
            	'name_group': name_group
            },
            url: "/admin/sms/updateGroup/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                    alert('Группа была редактирована');
		    	var name_group = $('#name_groupes').val(null);
		    	$('#edit_group').modal('hide');
		    	$('#group_table').DataTable().draw();
			location.reload();
                }
            }
        });
    }

    function deleteGroup(id)
    {
        var post = $.ajax({
            method: 'POST',
            data : {
            	
            },
            url: "/admin/sms/deleteGroup/"+ id,
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                    alert('Группа была удалена');
			    	$('#group_table').DataTable().draw();
				location.reload();

                }
            }
        });
    }

    function send()
    {
    	var groupId = $('#groupIdForSms').val();
    	var text    = $('#text').val();
        var post = $.ajax({
            method: 'POST',
            data : {
            	'groupId': groupId, 'text': text
            },
            url: "/admin/sms/send",
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                    alert('Рассылка была отправлена всей группе');
                    getBalance();
                }
            }
        });
    }

    function getBalance()
    {
        $.ajax({
            method: 'POST',
            url: "/admin/sms/phone/getBalance",
            success : function(result){
                result = JSON.parse(result);
                if(result.status){
                  $('#balance').text(result.balance + ' ' + 'смс');
                }
            }
        });
    }
</script>

<?php include ROOT . '/Site/layouts/footer_admin.php'; ?>
