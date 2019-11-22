<?php require_once __DIR__. "/autoload/autoload.php";
$user = $db->fetchID("users", intval($_SESSION['name_id']));


if($_SERVER['REQUEST_METHOD'] =="POST")
{
	$data = 
	[
	'amount' => $_SESSION['tongtien'],
	'users_id' => $_SESSION['name_id'],
	'note' => postInput("note")
	];

	$idtran = $db->insert("transaction",$data);
	if($idtran > 0)
	{
		foreach($_SESSION['cart'] as $key=> $value)
		{
			$data2 =
			[
			'transaction_id' => $idtran,
			'product_id' => $key,
			'qty' => $value['qty'],
			'price' => $value['price']

			];

			$id_insert = $db->insert("orders",$data2);
		}

		$_SESSION['success']="Purchased successfully, We will contact you soon! ";

		

		header("location: thong-bao.php");
	}
}

	












?>
 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Payment</a> </h3>
                            <form class="form-horizontal formcustomer" action='' method="POST" role="form" style="margin-top:20px" >
                        <div class="form-group">
                             <label class="col-md-2 col-md-offset-1"> Member name</label>
                        <div class="col-md-8">
                            <input type="text" readonly=""name="name" placeholder="Enter Name here" class="form-control" value="<?php echo $user['name'] ?>">
                             
                             
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Email</label>
                        <div class="col-md-8">
                            <input type="email" readonly=""name="email" placeholder="Enter Email here" class="form-control" value="<?php echo $user['email'] ?>">
                           
                            
                        </div> 
                    </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Phone Number</label>
                        <div class="col-md-8">
                            <input type="number" readonly=""name="phone" placeholder="Enter Number here" class="form-control"  value="<?php echo $user['phone'] ?>">
                            
                            
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Address </label>
                        <div class="col-md-8">
                            <input type="text" readonly=""name="address" placeholder="Enter Address here" class="form-control" value="<?php echo $user['address'] ?>" >
                            
                            
                        </div>
                    </div>

                   
                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Message </label>
                        <div class="col-md-8">
                            <input type="text" name="note" placeholder="Enter Message here" class="form-control" value="" >
                            <p class="help-block">Feel free leave a message here</p>
                            
                        </div>
                    </div>

                     <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Total Money </label>
                        <div class="col-md-2">
                            <input type="text" readonly=""name="address" placeholder="Enter Address here" class="form-control" value="<?php echo formatPrice($_SESSION['tongtien']) ?>" >
                            <p class="help-block">Your total money</p>
                            
                        </div>
                    </div>


                    

                    <button type ="submit" class="btn btn-success" style="margin-bottom:20px;"> Purchase</button>
                  </form>
  
                           
                            </div>
                        </section>
                    </div>
                </div>

    <?php  require_once __DIR__. "/layouts/Footer.php"; ?>
                