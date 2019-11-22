<?php 
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$EditTransaction = $db->fetchID("transaction",$id);
if( empty($EditTransaction))
{
  $_SESSION['error'] = "Data not found";
  redirectAdmin("transaction");
}
if($EditTransaction['status']== 1)
{
	$_SESSION['error'] = "Order already delivered!!";
  redirectAdmin("transaction");
}
$status = 1;

$update = $db-> update ("transaction",array("status" => $status), array("id" => $id));
    
    if ($update > 0)
    {
      $_SESSION['success'] =" Edit successfully";

      $sql = "SELECT product_id FROM orders WHERE transaction_id = $id ";
      $Order = $db->fetchSql($sql);
      foreach ($Order as $item ) {
      	$idproduct = intval($item['product_id']);

      	$product = $db->fetchID("product",$idproduct);

      	$number = $product['number'] - $item['qty'];

      	$up_pro = $db->update("product",array("number"=>$number,"paid"=>$product['paid']+1),array("id"=>$idproduct));

      }

      redirectAdmin("transaction");
    }
    else
    {
      $_SESSION['error'] =" Data not change";
      redirectAdmin("transaction");

    }






?>