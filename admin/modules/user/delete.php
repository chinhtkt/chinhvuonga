<?php
$open ="category";    
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$DeleteAdmin= $db->fetchID("users",$id);
if(empty($DeleteAdmin))
{
  $_SESSION['error'] = 'Data Not Found';
  redirectAdmin("user");
}
$num = $db->delete("users",$id);
if($num > 0)
{
  $_SESSION['success'] = "Deleted";
  redirectAdmin("user");

}
else
{
  $_SESSION['error'] = "Cannot Delete";
  redirectAdmin("user");

}







    
  
 
?>


 product