<?php   
$open = "transaction";
require_once __DIR__. "/../../autoload/autoload.php";


if(isset($_GET['page']))
{
    $p = $_GET['page'];

}
else
{
    $p=1;
}

$sql= "SELECT transaction.* ,users.name as nameuser , users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC ";

$transaction = $db->fetchJone('transaction',$sql,$p,5,true);

if (isset($transaction['page']))
{
    $sotrang = $transaction['page'];
    unset($transaction['page']);

}





?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Orders List
                                
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
                <th>Phone</th>
                <th>Status</td>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt= 1; foreach ($transaction  as $item): ?>
             <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $item['nameuser']?></td>
                <td><?php echo $item['phoneuser']?></td>
                <td>
                    <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-success' ?>"><?php echo $item['status']==0 ? 'Not pay' : 'Paid' ?></a>
                </td>
             

                <td>
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
     