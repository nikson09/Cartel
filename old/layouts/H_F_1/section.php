<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="new-sleva">
                        <?php foreach ($categories_2 as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><a href="/sub_categorys/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a>
                                    </h6>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <h4 id="categor_name">Категории</h4>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a>
                                    </h6>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a href="/wine/">Вино</a>
                                </h6>
                            </div>
                        </div>
                        <?php foreach ($categories_3 as $categoryItem): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a href="/category/<?php echo $categoryItem['id'];?>">
                                        <?php echo $categoryItem['name'];?></a>
                                </h6>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a href="/product-category">Продукты
                                        </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Категории-->

