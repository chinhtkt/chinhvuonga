<?php 


require_once __DIR__. "/autoload/autoload.php";

//unset($_SESSION['cart']);

$sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at ";
$CategoryHome = $db->fetchsql($sqlHomecate);



$data= [];


foreach ($CategoryHome as $item) {
    $cateId = intval($item['id']);


    $sql= "SELECT * FROM product WHERE category_id = $cateId ";
    $ProductHome = $db->fetchsql($sql);
    $data[$item['name']] = $ProductHome;
}










?>
 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                        </section>
                        <section class="box-main1">
                            <?php foreach ($data as $key => $value): ?>
                                 <h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
                            <div class="showitem">
                            <?php foreach ($value as $item): ?>
                            <div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']  ?></a>
                                        <p><strike class="sale"></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                    </div>
                                    <div class="hidenitem">
                                        <p><a href=""><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?> "><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>
                            <?php endforeach ?>    


                                 
                            </div>
                            <?php endforeach ?>
                            
                           

                        </section>

                    </div>
    

    <?php  require_once __DIR__. "/layouts/Footer.php"; ?>
 <script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
</script>               