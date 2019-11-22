<?php 
session_start();
require_once __DIR__. "/../libraries/Database.php";
require_once __DIR__. "/../libraries/Function.php";
$db = new Database;
$error = [];


$data =
[
'email' => postInput("email"),
'password' =>postInput("password")
];


if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	 if($data['email'] == '')
  {
    $error['email'] ="Please input your email !";
  }



if($data['password'] == '')
  {
    $error['password'] ="Please input your password !";
  }

  if(empty($error))
  {
    $is_check = $db->fetchOne("admin","email = '".$data['email']." ' AND password = '".md5($data['password'])."' ");

     if($is_check != NULL)
     {
        $_SESSION['admin_name'] = $is_check['name'];
        $_SESSION['admin_id'] = $is_check['id'];
        echo "<script>alert('Welcome admin');location.href='/chinhvuonga/admin/'</script>";

     }
     else
     {
          $_SESSION['error'] = "Login Failed,Please check your username and password again";  
     }
  }
}






?>

<head>
	 <!-- Latest compiled and minified CSS & JS -->
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	 <script src="//code.jquery.com/jquery.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


</head>


<style type="text/css">


body,html {
    background-image: url('https://i.imgur.com/xhiRfL6.jpg');
    height: 100%;
}

#profile-img {
    height:180px;
}
.h-80 {
    height: 80% !important;
}



</style>




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include the above in your HEAD tag -->

<div class="container h-80">
<div class="row align-items-center h-100">
    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="" method="POST">
            	<span id="reauth-email", class="reauth-email"</span>
            	<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control form-group" placeholder="password" required >
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
        </div>
    </div>
</div>
</div>

