<?php    
require_once __DIR__. "/../../autoload/autoload.php";
$category = $db->fetchAll("category");




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
                            <!--thong bao loi---->
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
                <th>Slug</th>
                <td>Home</td>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt= 1; foreach ($category as $item): ?>
             <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $item['name']?></td>
                <td><?php echo $item['slug']?></td>
                <td>
                    <a href="home.php?id=<?php echo $item['id']?>" class="btn btn-xs btn-info">
                        <?php echo $item['home'] == 1 ? 'Show' : 'None'  ?></a> 
                </td>
                <td><?php echo $item['created_at']?></td>

                <td>
                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>">Edit</a>
                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                </td>
            </tr> 
        <?php $stt++ ;endforeach ?>
           
        </tbody>

    </table>
    <ul class="pagination">
  <ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>

</div> 
                    <!-- /.row -->
    <?php require_once __DIR__. "/../../layouts/footer.php"; ?>
     