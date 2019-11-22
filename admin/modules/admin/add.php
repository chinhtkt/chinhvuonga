<?php
$open="admin";   
require_once __DIR__. "/../../autoload/autoload.php";

$data =
  [
  "name" => postInput('name'),
  "address" => postInput("address"),
  "email"=> postInput("email"),
  "password"=> MD5(postInput("password")),
  "phone" => postInput("phone"),
  "level" => postInput ("level")
  ];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  

  

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
  else
  {
    $is_check = $db->fetchOne("admin"," email = '".$data['email']."' ");
    if($is_check != NULL )
    {
         $error['email'] ="Email already exist";

    }
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

  if($data['password'] != MD5(postInput("re_password")))
  {
    $error['password'] = "Enter again";

  }


  if (empty($error))
  {

    $id_insert = $db->insert("admin",$data);
    if("id_insert")
    {
      $_SESSION['success'] = "Add Successfully";
      redirectAdmin("admin");
    }
    else
    {
      $_SESSION['error'] = " Failed";
    }
  }
}






  


    

    

   

  


    
  









    
  
 
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Add new Admin 
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
      <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" values="<?php echo $data['name'] ?>"> 
      <?php if (isset($error['name'])): ?>
      <p class ="text-danger"> <?php echo $error ['name'] ?> </p>
    <?php endif ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Enter email" name="email" values="<?php echo $data['email'] ?>"> 
      <?php if (isset($error['email'])): ?>
      <p class ="text-danger"> <?php echo $error ['email'] ?> </p>
    <?php endif ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="inputEmail3" placeholder="Enter Number" name="phone" values="<?php echo $data['phone'] ?>"> 
      <?php if (isset($error['phone'])): ?>
      <p class ="text-danger"> <?php echo $error ['phone'] ?> </p>
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
      <input type="password" class="form-control" id="inputEmail3" placeholder="Enter here" name="re_password" required=""> 
      <?php if (isset($error['re_password'])): ?> 
      <p class ="text-danger"> <?php echo $error ['re_password'] ?> </p>
    <?php endif ?> 
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Enter here" name="address" values="<?php echo $data['address'] ?>"> 
      <?php if (isset($error['address'])): ?>
      <p class ="text-danger"> <?php echo $error ['address'] ?> </p>
    <?php endif ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
    <div class="col-sm-8">
      <select class="form-control" name="level">
        <option value= "1"<?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selected'" : '' ?>> Moderator</option>
        <option value= "2"<?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selected'" : '' ?>> Admin</option>
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