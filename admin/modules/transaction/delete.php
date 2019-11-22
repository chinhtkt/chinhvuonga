<?php
$open ="category";    
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$Edittransaction= $db->fetchID("transaction",$id);
if(empty($Edittransaction))
{
  $_SESSION['error'] = 'Data Not Found';
  redirectAdmin("transaction");
}
$num = $db->delete("transaction",$id);
if($num > 0)
{
  $_SESSION['success'] = "Deleted";
  redirectAdmin("transaction");

}
else
{
  $_SESSION['error'] = "Cannot Delete";
  redirectAdmin("transaction");

}







    
  
 
?>






