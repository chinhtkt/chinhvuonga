<?php
$open ="category";    
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$DeleteAdmin= $db->fetchID("admin",$id);
if(empty($DeleteAdmin))
{
  $_SESSION['error'] = 'Data Not Found';
  redirectAdmin("admin");
}
$num = $db->delete("admin",$id);
if($num > 0)
{
  $_SESSION['success'] = "Deleted";
  redirectAdmin("admin");

}
else
{
  $_SESSION['error'] = "Cannot Delete";
  redirectAdmin("admin");

}







    
  
 
?>


 product