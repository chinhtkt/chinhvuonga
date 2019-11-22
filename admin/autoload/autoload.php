<?php 
session_start();
require_once __DIR__. "/../../libraries/Database.php";
require_once __DIR__. "/../../libraries/Function.php";


$db = New Database ;


if(! isset($_SESSION['admin_id']))
{
	header("location:/chinhvuonga/login/");
}


define("ROOT", $_SERVER['DOCUMENT_ROOT']."/chinhvuonga/public/uploads/");
?>	