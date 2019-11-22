<?php
$open ="category";    
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$EditProduct= $db->fetchID("product",$id);
if(empty($EditProduct))
{
  $_SESSION['error'] = 'Data Not Found';
  redirectAdmin("product");
}
$num = $db->delete("product",$id);
if($num > 0)
{
  $_SESSION['success'] = "Deleted";
  redirectAdmin("product");

}
else
{
  $_SESSION['error'] = "Cannot Delete";
  redirectAdmin("product");

}







    
  
 
?>


 product