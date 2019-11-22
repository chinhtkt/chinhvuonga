<?php require_once __DIR__. "/autoload/autoload.php"; 

$id = intval(getInput('id'));
$EditCategory= $db->fetchID("category",$id);

$sql = "SELECT * FROM product WHERE category_id = $id";
$product = $db->fetchsql($sql);
?>




 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> <?php echo $EditCategory['name']?></a> </h3>
                            <div class="showitem clearfix">
                            	<?php foreach ($product as $item):  ?>
                            	<div class="col-md-3 item-product bor">
                                     <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']  ?></a>
                                        <p><strike class="sale"></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                    </div>
                                    <div class="hidenitem">
                                        <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>

                            <?php endforeach ?>
                                
                              
                            </div>
                        </section>
                    </div>
               

    <?php  require_once __DIR__. "/layouts/Footer.php"; ?>
                