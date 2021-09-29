<?php include ROOT . '/Site/layouts/H_F_1/header.php'; ?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php include ROOT . '/Site/layouts/H_F_1/section.php'; ?>


    <div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->




    <div class="Items_Back ">



    <div class="container">
        <div class="row justify-content-center">





            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                    <a href='/cabinet/edit'>Вернуться назад</a>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                     <div class="signup-form">
                         <div class="row justify-content-center">
                    <h2>Редактирование данных</h2>
<table width="600" border="0">
   <tr>
    <td> Изменить логин</td>
    <td>
        <form action='#' method='post'>
        <input name='name' placeholder="логин"  type='text 'value="<?php echo $name; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
   <tr>
    <td> Изменить пароль</td>
    <td>
        <form action='#' method='post'>
        <input name='password' placeholder="пароль"  type='password'>
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  <tr>
    <td> Изменить ФИО</td>
    <td>
        <form action='#' method='post'>
        <input name='name_long' placeholder="ФИО"  type='text' value="<?php echo $name_long; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  <tr>
    <td> Изменить Область</td>
    <td>
        <form action='#' method='post'>
        <input name='Oblast' placeholder="Область"  type='text' value="<?php echo $oblast; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  <tr>
    <td> Изменить город</td>
    <td>
        <form action='#' method='post'>
        <input name='City' placeholder="город"  type='text' value="<?php echo $city; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
   <tr>
    <td> Изменить Email</td>
    <td>
        <form action='#' method='post'>
        <input name='email' placeholder="email"  type='text' value="<?php echo $email; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  </table>
  </div>
  </div>
                    
                <?php endif; ?>
                <br/>
                <a class="row justify-content-left" href='/cabinet'>Вернуться назад</a>
                <br/>
                
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-sm-12 padding-right" >
    <div class="features_items"><!--features_items-->




    <div class="Items_Back_Mobile ">



    <div class="container">
        <div class="row justify-content-center">





            <div class="col-sm-12 col-sm-offset-12 padding-right">
                
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                    <a href='/cabinet/edit'>Вернуться назад</a>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                     <div class="signup-form">
                         <div class="row justify-content-center">
                    <h2>Редактирование данных</h2>
<table width="300" border="0">
   <tr>
    <td> Изменить логин</td>
    <td>
        <form action='#' method='post'>
        <input name='name' placeholder="логин"  type='text 'value="<?php echo $name; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
   <tr>
    <td> Изменить пароль</td>
    <td>
        <form action='#' method='post'>
        <input name='password' placeholder="пароль"  type='password'>
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  <tr>
    <td> Изменить ФИО</td>
    <td>
        <form action='#' method='post'>
        <input name='name_long' placeholder="ФИО"  type='text' value="<?php echo $name_long; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  <tr>
    <td> Изменить Область</td>
    <td>
        <form action='#' method='post'>
        <input name='Oblast' placeholder="Область"  type='text' value="<?php echo $oblast; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  <tr>
    <td> Изменить город</td>
    <td>
        <form action='#' method='post'>
        <input name='City' placeholder="город"  type='text' value="<?php echo $city; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
   <tr>
    <td> Изменить Email</td>
    <td>
        <form action='#' method='post'>
        <input name='email' placeholder="email"  type='text' value="<?php echo $email; ?>">
        <input type='submit' name='submit' value='Изменить'>
        </form>
    </td>
  </tr>
  </table>
  </div>
  </div>
                    
                <?php endif; ?>
                <br/>
                <a class="row justify-content-left" href='/cabinet'>Вернуться назад</a>
                <br/>
                
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php include ROOT . '/Site/layouts/H_F_1/footer.php'; ?>