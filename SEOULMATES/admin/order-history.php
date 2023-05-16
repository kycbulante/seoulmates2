<?php 
include('../functions/myfunctions.php');
include("includes/header.php"); 
if(!isset($_SESSION['admin']))
{
  echo"<script>alert('login')</script>";
  echo"<script>window.open('adminlogin.php','_self')</script>";
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Orders
                    <a href="orders.php" class="btn btn-warning float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body" id="">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>user</th>
                            <th>tracking Id</th>
                            <th>price</th>
                            <th>date</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orders = getOrderHistory();

                        if(mysqli_num_rows($orders)>0)
                        {
                            foreach($orders as $item)
                            {?>
                            <tr>
                            <td><?= $item['id']?></td>
                            <td><?= $item['name']?></td>
                            <td><?= $item['tracking_id']?></td>
                            <td><?= $item['total_price']?></td>
                            <td><?= $item['created_at']?></td>
                            <td>
                                <a href="view-order.php?t=<?= $item['tracking_id']; ?>" class="btn btn-primary">View details</a>
                            </td>
                            </tr>
                            <?php

                            }
                        }
                        else{
                            ?>
                            <tr>
                             <td colspan="5">No orders yet</td>
                            
                            </td>
                        </tr>
                            <?php
                        }
                        
                        
                        ?>
                        
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

    
<?php include("includes/footer.php"); ?>