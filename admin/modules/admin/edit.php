<?php
$open="admin";   
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$Editadmin = $db->fetchID("admin",$id);
if( empty($Editadmin))
{
  $_SESSION['error'] = "Data not found";
  redirectAdmin("admin");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $data =
  [
  "name" => postInput('name'),
  "address" => postInput("address"),
  "email"=> postInput("email"),
  "phone" => postInput("phone"),
  "level" => postInput ("level")
];


  

  

$error = [];

    
if(postInput('name') == '')
  {
    $error['name'] = "Try again please";
  }

if(postInput('address')== '')
  {
    $error['address'] ="Please try again";
  }

if(postInput('email')== '')
  {
    $error['email'] ="Please try again";
  }


if(postInput('password')== '')
  {
    $error['password'] ="Please try again";
  }

if(postInput('phone')== '')
  {
    $error['phone'] ="Please try again";
  }

if(postInput('level')== '')
  {
     $error['level'] = "Please try again";
  }

  if(postInput('password') != NULL && postInput("re_password") != NULL)
  {
    if(postInput('password') != postInput('re_password'))
    {
      $error['password'] = "Password Doesn't Match";
    }
  }

 


  if (empty($error))
  {

    $id_update = $db->update("admin",$data,array("id"=>$id));
    if($id_update > 0)
    {
      $_SESSION['success'] = "Add Successfully";
      redirectAdmin("admin");
    }
    else
    {
      $_SESSION['error'] = " Failed";
      redirectAdmin("admin");
    }
  }
}






  


    

    

   

  


    
  









    
  
 
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Edit Admin 
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                  <li>
                                    <i></i>  <a href="">Admin</a>
                                </li> 
                                <li class="active">
                                    <i class="fa fa-file"></i> Add New
                                </li>
                            </ol>
                            <div class="clear fix"></div>
                            <!--thong bao loi---->
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <form class ="form-horizontanl" actions=""method="POST" enctype="multipart/form-data">
                          
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" values="<?php echo $Editadmin['name'] ?>"> 
      <?php if (isset($error['name'])): ?>
      <p class ="text-danger"> <?php echo $error ['name'] ?> </p>
    <?php endif ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Enter address" name="address" values="<?php echo $Editadmin['address'] ?>"> 
      <?php if (isset($error['address'])): ?>
      <p class ="text-danger"> <?php echo $error ['address'] ?> </p>
    <?php endif ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Enter Email" name="email" values="<?php echo $Editadmin['email'] ?>"> 
      <?php if (isset($error['email'])): ?>
      <p class ="text-danger"> <?php echo $error ['email'] ?> </p>
    <?php endif ?>
    </div>
  </div>

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputEmail3" placeholder="Enter here" name="password"> 
      <?php if (isset($error['password'])): ?> 
      <p class ="text-danger"> <?php echo $error ['password'] ?> </p>
    <?php endif ?> 
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ConfigPassword</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputEmail3" placeholder="Enter here" name="re_password"> 
      <?php if (isset($error['re_password'])): ?> 
      <p class ="text-danger"> <?php echo $error ['re_password'] ?> </p>
    <?php endif ?> 
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="inputEmail3" placeholder="Enter here" name="phone" values="<?php echo $Editadmin['phone'] ?>"> 
      <?php if (isset($error['phone'])): ?>
      <p class ="text-danger"> <?php echo $error ['phone'] ?> </p>
    <?php endif ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
    <div class="col-sm-8">
      <select class="form-control" name="level">
        <option value= "1"<?php echo isset($Editadmin['level']) && $Editadmin['level'] == 1 ? "selected = 'selected'" : '' ?>> Moderator</option>
        <option value= "2"<?php echo isset($Editadmin['level']) && $Editadmin['level'] == 2 ? "selected = 'selected'" : '' ?>> Admin</option>
      </select>
      
      <?php if (isset($error['level'])): ?>
      <p class ="text-danger"> <?php echo $error ['level'] ?> </p>
    <?php endif ?>
    </div>
  </div>


  

   <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
 </div>
</div>

                    <!-- /.row -->
 <?php require_once __DIR__. "/../../layouts/footer.php"; 
 ?>



 <?php


 ?> 