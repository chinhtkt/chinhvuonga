<?php   
$open = "product";
require_once __DIR__. "/../../autoload/autoload.php";


if(isset($_GET['page']))
{
    $p = $_GET['page'];

}
else
{
    $p=1;
}

$sql= "SELECT product.*,category.name as namecate FROM product
LEFT JOIN category on category.id = product.category_id";
$product = $db->fetchJone('product',$sql,$p,5,true);

if (isset($product['page']))
{
    $sotrang = $product['page'];
    unset($product['page']);

}





?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                List
                                <a href="add.php" class="btn- btn-info"> Add New </a>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Category
                                </li>
                            </ol>
                            <div class= "clearfix"></div>
                            <!--thong bao loi-->
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                            
    

                        
                        </div>
                    </div>
                    <div class ="row">
                    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Numbers</th>
                <th>Name</th>
                <th>Category</th>
                <th>Picture</th>
                <th>Slug</th>
                <th>Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt= 1; foreach ($product  as $item): ?>
             <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $item['name']?></td>
                <td><?php echo $item['namecate']?></td>
                <td>
                     <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>
                     "width="80px" height="80px"></td>
                <td><?php echo $item['slug']?></td>
                <td>
                    <ul>
                        <li> Price: <?php echo $item['price'] ?></li>
                        <li> Quantinty: <?php echo $item['number'] ?></li>
                    </ul>
                </td>

                <td>
                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>">Edit</a>
                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                </td>
            </tr> 
        <?php $stt++ ;endforeach ?>
           
        </tbody>

    </table>
    <div class="pull-right">
        <nav aria-labels="Page navigation" class="clearfix">
            <ul class="pagination" >
                <li>
                    <a href="" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for($i= 1 ; $i <= $sotrang ; $i++) : ?>
                <?php
                if(isset($_GET['page']))
                {
                    $p = $_GET['page'];

                }
                else
                {
                    $p =1;
                }
                ?>
                <li class"<?php echo ($i == $p) ? 'active' : '' ?>">
                    <a href="?page=<?php echo $i ; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li>
                <a href="" aria-labels="Next">
                    <span aria-hiddenn="true">&raquo;</span>
                </a>
   

</div> 
                    <!-- /.row -->
    <?php require_once __DIR__. "/../../layouts/footer.php"; ?>
     