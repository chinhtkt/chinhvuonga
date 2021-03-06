<?php
$open ="product";    
require_once __DIR__. "/../../autoload/autoload.php";



$id= intval(getInput('id'));


$Editproduct= $db->fetchID("product",$id);
if(empty($Editproduct))
{
  $_SESSION['error'] = 'Data Not Found';
  redirectAdmin("product");
}

$category = $db-> fetchAll("category");


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $data =
  [
  "name" => postInput('name'),
  "slug" => to_slug(postInput("name")),
  "category_id" => postInput("category_id"),
  "price" => postInput("price"),
  "sale" => postInput("sale"),
  "number" => postInput("number"),
  "content" => postInput ("content")
  ];

  
  $error = [];

    
    if(postInput('name') == '')
  {
    $error['name'] = "Please try again";

  }

  if(postInput('category_id') == '')
  {
    $error['category_id'] = "Please try again";

  }
  if(postInput('price') == '')
  {
    $error['price'] = "Please Enter Price";

  }
  if(postInput('content') == '')
  {
    $error['content'] = "Please try again";

  }
  if(!isset($_FILES['thunbar']))
  {
     $error['thunbar'] = "Please try again";
  }
   if(postInput('number') == '')
  {
    $error['number'] = "Please try again";

  }

  if (empty($error))
  {

    {
    if (isset($_FILES['thunbar']))
    $file_name = $_FILES['thunbar']['name'];
    $file_tmp = $_FILES['thunbar']['tmp_name'];
    $file_type = $_FILES['thunbar']['type'];
    $file_erro = $_FILES['thunbar']['error'];

    if ($file_erro ==0)
    {
      $part = ROOT ."product/";
      $data['thunbar'] = $file_name;
    }
  }
  $update = $db-> update("product", $data,array("id"=>$id));
  if($update >0)
  {
    move_uploaded_file($file_tmp,$part.$file_name);
    $_SESSION['success'] = "Update Successfully";
    redirectAdmin("product");
  }
  else
  {
    $_SESSION ['error'] = "Update Failed";
    redirectAdmin("product");
  }
}
}


    
  









    
  
 
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Edit new Product 
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                  <li>
                                    <i></i>  <a href="">Product</a>
                                </li> 
                                <li class="active">
                                    <i class="fa fa-file"></i> Add New
                                </li>
                            </ol>
                            <div class="clear fix"></div>
                            <!--thong bao loi-->
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <form class ="form-horizontanl" actions=""method="POST" enctype="multipart/form-data">
                          <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Category</label>
    <div class="col-sm-8">
      <select class ="form-control col-md-8" name="category_id">
        <option value=""> -Select Product Category - </option>
        <?php foreach ($category as $item): ?>
        <option value="<?php echo $item['id'] ?>" <?php echo $Editproduct['category_id'] == $item['id'] 
        ? "selected = 'selected'" : '' ?>><?php echo  $item ['name'] ?></option>
      <?php endforeach ?>
      </select>
      <?php if (isset($error['category_id'])): ?>
      <p class ="text-danger"> <?php echo $error ['category_id'] ?> </p>
    <?php endif ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" value="<?php echo $Editproduct['name'] ?>"> 
      <?php if (isset($error['name'])): ?>
      <p class ="text-danger"> <?php echo $error ['name'] ?> </p>
    <?php endif ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="inputEmail3" placeholder="Enter price here" name="price" value="<?php echo $Editproduct['price'] ?>"> 
      <?php if (isset($error['price'])): ?> 
      <p class ="text-danger"> <?php echo $error ['price'] ?> </p>
    <?php endif ?>
    </div>
  </div>
<!--<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Sale</label>
<div class="col-sm-3">
<input type="number" class="form-control" id="inputEmail3" placeholder="%" name="sale" value="<?php echo $Editproduct['sale']?>"> 
</div>-->



  <label for="inputEmail3" class="col-sm-1 col-form-label">Picture</label>
    <div class="col-sm-3">
      <input type="file" class="form-control" id="inputEmail3" name="thunbar" value="0 ">
      <?php if (isset($error['thunbar'])): ?>
      <p class ="text-danger"> <?php echo $error ['thunbar'] ?> </p>
    <?php endif ?>
    <img src= "<?php echo uploads() ?>product/ <?php echo $Editproduct['thunbar'] ?>"
    <width="100px" height="50px"> 
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-2">
      <input type="number" class="form-control" id="inputEmail3" placeholder="Enter number here" name="number" value="<?php echo $Editproduct['number']?>"> 
      <?php if (isset($error['number'])): ?> 
      <p class ="text-danger"> <?php echo $error ['number'] ?> </p>
    <?php endif ?>
    </div>
  </div>




  </div>
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
    <div class="col-sm-8">
      <textarea class ="form-control" name="content" rows="5" value="<?php echo $Editproduct['content']?>"></textarea>
      <?php if (isset($error['content'])): ?> 
      <p class ="text-danger"> <?php echo $error ['content'] ?> </p>
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
     