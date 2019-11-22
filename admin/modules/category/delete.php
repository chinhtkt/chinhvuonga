<?php
$open ="category";    
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$EditCategory= $db->fetchID("category",$id);
if(empty($EditCategory))
{
  $_SESSION['error'] = 'Data Not Found';
  redirectAdmin("category");
}
$num = $db->delete("category",$id);
if($num > 0)
{
  $_SESSION['success'] = "Deleted";
  redirectAdmin("category");

}
else
{
  $_SESSION['error'] = "Cannot Delete";
  redirectAdmin("category");

}







    
  
 
?>


 