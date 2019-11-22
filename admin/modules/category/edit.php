<?php
$open ="category";    
require_once __DIR__. "/../../autoload/autoload.php";

$id= intval(getInput('id'));


$EditCategory= $db->fetchID("category",$id);
if(empty($EditCategory))
{
  $_SESSION['error'] = 'Data Not Found';
  redirectAdmin("category");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $data =
  [
    "name"=>  postInput('name'),
    "slug"=> to_slug(postInput("name"))
  ];
  
  $error = [];

  if(postInput('name') == '')
  {
    $error['name'] = "Please try again";

  }
  if (empty($error))
  {
    $id_update = $db->update("category",$data,array("id"=>$id));
    if ($id_update > 0)
    {
      $_SESSION['success'] =" Edit successfully";
      redirectAdmin("category");
    }
    else
    {
      $_SESSION['error'] =" Edit failed";
      redirectAdmin("category");

    }
    
  }

}






    
  
 
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Edit new Category 
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                  <li>
                                    <i></i>  <a href="">Category</a>
                                </li> 
                                <li class="active">
                                    <i class="fa fa-file"></i> Edit New
                                </li>
                            </ol>
                            <div class="clear fix"></div>
                            <!--thong bao loi---->
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <form class ="form-horizontanl" actions=""method="POST">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" value="<?php echo $EditCategory['name'] ?>"> 
      <?php if (isset($error['name'])): ?>
      <p class ="text-danger"> <?php echo $error ['name'] ?> </p>
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
     