<?php 

require_once __DIR__. "/autoload/autoload.php"; 



$data =
[
'email' => postInput("email"),
'password' => (postInput("password"))
];


$error = [];
if($_SERVER['REQUEST_METHOD'] == "POST")
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
    $is_check = $db->fetchOne("users"," email = '".$data['email']." ' AND password = '".md5($data['password'])."' ");
   

     if($is_check != NULL)
     {
        $_SESSION['name_user'] = $is_check['name'];
        $_SESSION['name_id'] = $is_check['id'];
        echo "<script>alert('Login Successfully');location.href='index.php'</script>";

     }
     else
     {
          $_SESSION['error'] = "Login Failed,Please check your username and password again";  
     }
  }

}





?>
 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Login </a> </h3>
                            <?php  if (isset($_SESSION['success'])): ?>
                            <div class ="alert alert-success">
                             <?php echo $_SESSION['success'] ;unset($_SESSION['success'])?>
                         </div>
                            <?php endif ?>

                            <?php  if (isset($_SESSION['error'])): ?>
                            <div class ="alert alert-danger">
                             <?php echo $_SESSION['error'] ;unset($_SESSION['error'])?>
                         </div>
                            <?php endif ?>

                            <form class="form-horizontal formcustomer" action='' method="POST" role="form" style="margin-top:20px" >
                        

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" placeholder="Enter Email here" class="form-control">
                             <?php if(isset($error['email'])): ?>
                            <p class ="text-danger"><?php echo $error['email'] ?></p>
                     <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" placeholder="Enter Password here" class="form-control">
                            <?php if(isset($error['password'])): ?>
                            <p class ="text-danger"><?php echo $error['password'] ?></p>
                     <?php endif ?>
                        </div>
                    </div>

                    <button type ="submit" class="btn btn-success" style="margin-bottom:20px;"> Login</button>
                    <p>New Menber? <a href='dang-ky.php'>Click here to register</a></p>

  
                        </section>
                           
                            </div>
                        </section>
                    </div>
                </div>

    <?php  require_once __DIR__. "/layouts/Footer.php"; ?>


                