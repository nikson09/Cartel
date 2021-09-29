<?php include ROOT . '/Site/layouts/H_F_1/header.php'; ?>
<?php include ROOT. '/Site/layouts/H_F_1/section_mobile.php'; ?>
<?php include ROOT . '/Site/layouts/H_F_1/section.php'; ?>

    <div class="col-sm-9 padding-right" >
        <div class="features_items"><!--features_items-->




            <div class="Items_Back ">


                <div class="user_cabinet">
                <div class="container">
                    <div class="row justify-content-center">

            <h1>Кабинет пользователя:</h1>
            
            <h3>Привет, <?php echo $user['name'];?>!<br></h3>
            
            <div class="About_user">
           <?php echo "<strong> Фио: ".$user['name_long']."<br></strong>";
            echo "<strong> Область: ".$user['Oblast']."<br></strong>";
            echo "Город: ".$user['City']." <br>";
            echo "Email: ".$user['email']." <br><br>";?>
            </div>
            <div class="navigation">
            <ul class="user_li">
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                
            </ul>
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


                <div class="user_cabinet">
                <div class="container">
                    <div class="row justify-content-center">

            <h1>Кабинет пользователя:</h1>
            
            <h3>Привет, <?php echo $user['name'];?>!<br></h3>
            
            <div class="About_user">
           <?php echo "<strong> Фио: ".$user['name_long']."<br></strong>";
            echo "<strong> Область: ".$user['Oblast']."<br></strong>";
            echo "Город: ".$user['City']." <br>";
            echo "Email: ".$user['email']." <br><br>";?>
            </div>
            <div class="navigation">
            <ul class="user_li">
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                
            </ul>
            </div>
                    </div>
        </div>
    </div>
            </div>
        </div>

<?php include ROOT . '/Site/layouts/H_F_1/footer.php'; ?>