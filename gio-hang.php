<?php 
require_once __DIR__. "/autoload/autoload.php";
$sum = 0;


if( ! isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
{
    echo "<script>alert('You dont have any product');location.href='index.php'</script>";
}


?>
 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
                         <?php  if (isset($_SESSION['success'])): ?>
                            <div class ="alert alert-success">
                             <?php echo $_SESSION['success'] ;unset($_SESSION['success'])?>
                         </div>
                            <?php endif ?>
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Your cart</a> </h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                         <th>Product</th>
                                         <th>Picture</th>
                                         <th>Quantity</th>
                                         <th>Price</th>
                                         <th>Total</th>
                                         <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; foreach ($_SESSION['cart'] as $key => $value): ?>
                                   
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td>
                                           <img src="<?php echo uploads() ?>product/<?php echo $value['thunbar']?>" class="" width="100" height="80">
                                        </td>
                                        <td>
                                            <input type="number" name="qty" value="<?php echo $value['qty'] ?>" class="form-control" id="qty"  min="0">
                                        </td>
                                        <td><?php echo formatPrice($value['price']) ?></td>
                                        <td><?php echo formatPrice($value['price'] * $value['qty']) ?></td>
                                        <td> 
                                            <a href="remove.php?key=<?php echo $key ?>"class="btn btn-xs btn-danger">Remove</a>
                                            <a href="#" class="btn btn-xs btn-info updatecart"  data-key=<?php echo $key ?>> <i class="fa fa-refresh" ></i> Update</a>

                                        </td>
                                    </tr>
                                    <?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $sum ; ?>
                                <?php $stt ++; endforeach ?>
                                    
                                </tbody>
                            </table>
                            <div class="col-md-5 pull-right">
                                <ul class="list-group"
                                <li class="list-group-item">
                                    <h3> Order detail </h3>
                                </li>
                                <li class="list-group-item">
                                    <span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
                                    Total
                                </li>

                                <li class="list-group-item">
                                    <a href="thanh-toan.php" class="btn btn-info">Purchase</a>
                                    
                            </div>

                        </section>
                    </div>
    <?php  require_once __DIR__. "/layouts/Footer.php"; ?>
