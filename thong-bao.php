<?php 
require_once __DIR__. "/autoload/autoload.php";


unset($_SESSION['cart']);
unset($_SESSION['total']);

 ?>
 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
                        <section class="box-main1">
                        	<h3 class="title-main"><a href=""> Payment </h3>
                        	<?php  if (isset($_SESSION['success'])): ?>
                            <div class ="alert alert-success">
                              <?php echo $_SESSION['success'] ;unset($_SESSION['success'])?>
                         </div>
                            <?php endif ?>
                          <a href="index.php"class="btn btn-success"> Back to Homepage </a>        
                        </section>
                    </div>



    <?php  require_once __DIR__. "/layouts/Footer.php"; ?>
                