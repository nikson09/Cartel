<nav class="mainNav-mobile   clearfix">

    <div class="clearfix main-header-btn">
<div class="container">
 <div class="row">

        <a href="javascript:void(0);" class=" dropdown-toggle link-catalog_head text-center"  data-toggle="collapse" data-target="#navbar-header_mobile" aria-haspopup="true" aria-expanded="false" ><i></i>
        Каталог товаров
       </a>
                  </div></div>
            
   
</nav>

               
      <div id="navbar-header_mobile" class="dropdown-menu sidebar_mobile" style="height: 625px;  width: 100%;padding: 6px 6px 6px 10px !important;">
          
                <?php foreach ($categories_2 as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><a href="/sub_categorys/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h6>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    
                    <h4 id="categor_name">Категории</h4>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h6>
                                </div>
                            </div>

                    <?php endforeach; ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <a href="/wine/">Вино
                                    </a></h6>
                        </div>
                    </div>
                        <?php foreach ($categories_3 as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h6>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <a href="/product-category">Продукты
                                    </a></h6>
                        </div>
                    </div>
                        </div>
</div>
                        </div>