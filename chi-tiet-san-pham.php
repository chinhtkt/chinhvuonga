<?php require_once __DIR__. "/autoload/autoload.php"; 

$id = intval(getInput('id'));
$product= $db->fetchID("product",$id);



$cateid = intval($product['category_id']);


$sql="SELECT * FROM product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 4";
$sanphamkemtheo = $db->fetchsql($sql);


?>














 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
          

                        <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                
                                
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    <li><h3><?php echo $product['name']?> </h3></li>

                                    <?php if ($product['sale'] > 0 ): ?>

                                    <li><p><strike class="sale"><?php echo formatPrice($product['price']) ?></strike> <b class="price"><?php echo formatpricesale($product['price'],$product['sale'])?></b</li>
                                    

                                <?php else : ?>
                                <li><p><b><?php echo formatPrice($product['price']) ?> </b</li>
                                    

                            <?php endif ?>

                                <li><a href="addcart.php?id=<?php echo $product['id'] ?>"class="btn btn-success"> Add To Cart</a></li>
                                    
                               </ul>
                            </div>

                        </section>
                        <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">About this product </a></li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Content</h3>
                                        <p><?php echo $product ['content'] ?></p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3> Thông tin khác </h3>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Menu 2</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <h3>Menu 3</h3>
                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="showitem">
                                <h3>Product Including</h3>
                                <br>
                            <?php foreach ($sanphamkemtheo as $item): ?>
                            <div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']  ?></a>
                                        <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                    </div>
                                    <div class="hidenitem">
                                        <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href="addcart.php?id=<?php echo item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>
                            <?php endforeach ?>    


                                 
                            </div>
                    </div>
                </div>

    <?php  require_once __DIR__. "/layouts/Footer.php"; 

    ?>
                