<?php 
session_start();
require_once __DIR__. "/../libraries/Database.php";
require_once __DIR__. "/../libraries/Function.php";


$db = New Database ;


define("ROOT", $_SERVER['DOCUMENT_ROOT']."/chinhvuonga/public/uploads/");






$category =$db->fetchAll("category");
$sqlNew ="SELECT * FROM  product WHERE 1 ORDER BY ID DESC LIMIT 3";
$productNew = $db->fetchsql($sqlNew);


?>


