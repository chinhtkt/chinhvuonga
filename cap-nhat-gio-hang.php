<?php 

require_once __DIR__. "/autoload/autoload.php";
$key = intval(getInput("key"));
$qty = intval(getinput("qty"));

$_SESSION['cart'][$key]['qty'] = $qty;

echo 1;




?>