<?php 
require_once __DIR__. "/autoload/autoload.php";
if(isset($_SESSION['name_id']))
{   
echo "<script>alert('You already are a member');location.href='index.php'</script>";
}

$data =
[
'name' => postInput("name"),
'email' => postInput("email"),
'password' => MD5(postInput("password")),
'address' => postInput("address"),
'phone' => postInput("phone")
];
$error = [];
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  
  if($data['name'] == '')
  {
    $error['name'] ="Please try again";
  }


  if($data['email'] == '')
  {
    $error['email'] ="Please input your email !";
  }

 
  if($data['phone'] == '')
  {
    $error['phone'] ="Please input your phone !";
  }

   
  if($data['password'] == '')
  {
    $error['password'] ="Please input your password !";
  }

  else
  {
    $data['password'] = MD5(postInput("password")); 
  }

 
  if($data['address'] == '')
  {
    $error['address'] ="Please input your address !";
  }

  if(empty($error))
  {
    $idinert = $db->insert("users",$data);
    if($idinert > 0 )
    {
        $_SESSION['success'] = "Register Successfully";
       header("location: dang-nhap.php");
    }
    else 
    {
        echo "Register Failed";
    }
  }

}














?>






 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">

                        <section class="box-main1">
                            <h3 class="title main"<a href="">Register </a> </h3>   
                      <form class="form-horizontal formcustomer" action='' method="POST" role="form" style="margin-top:20px" >
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Member name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" placeholder="Enter Name here" class="form-control" value="<?php echo $data['name'] ?>">
                             <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                             <?php if(isset($error['name'])): ?>
                             <p class = "text-danger"><?php echo $error['name'] ?></p>

                         <?php endif ?>
                        </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" placeholder="Enter Email here" class="form-control" value="<?php echo $data['email'] ?>">
                            <p class="help-block">Please provide your E-mail</p>
                            <?php if(isset($error['email'])): ?>
                            <p class ="text-danger"><?php echo $error['email'] ?></p>
                     <?php endif ?>
                        </div> 
                    </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" placeholder="Enter Password here" class="form-control" value="<?php echo $data
                            ['password'] ?>" >
                            <p class="help-block">Password should be at least 4 characters</p>
                            <?php if(isset($error['password'])): ?>
                            <p class ="text-danger"><?php echo $error['password'] ?></p>
                     <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Phone Number</label>
                        <div class="col-md-8">
                            <input type="number" name="phone" placeholder="Enter Number here" class="form-control"  value="<?php echo $data['phone'] ?>">
                            <p class="help-block">Enter your phone number :)</p>
                            <?php if(isset($error['phone'])): ?>
                            <p class ="text-danger"><?php echo $error['phone'] ?></p>
                     <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Address </label>
                        <div class="col-md-8">
                            <input type="text" name="address" placeholder="Enter Address here" class="form-control" value="<?php echo $data['address'] ?>" >
                            <p class="help-block">Enter your address here,dont worry we won't track your house :)</p>
                            <?php if(isset($error['address'])): ?>
                            <p class ="text-danger"><?php echo $error['address'] ?></p>
                     <?php endif ?>
                        </div>
                    </div>

                    <button type ="submit" class="btn btn-success" style="margin-bottom:20px;"> Register</button>
                  </form>
  
                        </section>
                    </div>
                </div>

    <?php  require_once __DIR__. "/layouts/Footer.php"; ?>
        