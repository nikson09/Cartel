<?php
include ROOT. '/Site/layouts/H_F_1/header.php';
?>


<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>


<?php
include ROOT. '/Site/layouts/H_F_1/section.php';
?>


<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <div class="Items_Back ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4 col-offset-4 padding-center">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form"><!--sign up form-->
                            <h2 class="text-center">Вход на сайт</h2>
                            <form action="#" method="post">
                                <input type="name" name="name" placeholder="Логин" value="<?php echo $name; ?>"/>
                                <input type="password" name="password" placeholder="Пароль" value=""/>
                                <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                            </form>
                        </div><!--/sign up form-->
                        <br/>
                        <br/>
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
                    <div class="col-sm-4 col-sm-offset-4 padding-right">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form"><!--sign up form-->
                            <h2 class="title text-center">Вход на сайт</h2>
                            <form action="#" method="post">
                                <input type="email" name="name" placeholder="Логин" value="<?php echo $name; ?>"/>
                                <input type="password" name="password" placeholder="Пароль" value=""/>
                                <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                            </form>
                            <h2>Или</h2>
                            <a href="/user/register"> <button class="btn btn-default">Регистрация</button></a>
                        </div><!--/sign up form-->
                    <br/>
                    <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
<?php
include ROOT. '/Site/layouts/H_F_1/footer.php';
?>
