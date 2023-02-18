<?php
include_once "../views/heading.php";

?>
<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Tất cả danh mục</h4>
                            <ul>
                            <?php

                            foreach($categories as $item){
                                ?>
                                <li><a href="/detail?id=<?=$item->type_id ?>"><i class="fa-solid fa-check"></i> <?= $item->type_name?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>All sản phẩm</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                             
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <?php
                    
                 
                        foreach ($products as $item){
                        ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" >
                                    <img src="./src/imgs/img_product/<?=$item->product_avatar?>" alt="">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="/detail-product?id=<?=$item->product_id ?>"><i class="fa-solid fa-circle-info"></i></a></li>
                                        <li><a href="index.php?act=add_cart&id=<?= $item->product_id ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?=$item->product_name ?></a></h6>
                                    <h5><?=$item->product_price ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    <!-- <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    
    <?php
    require_once "../views/footer.php";
    ?>