<?php
include('../config/dbcon.php');
include('includes/header.php');
include('../functions/myfunctions.php');
// include('../middleware/adminMiddleware.php');
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
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>image</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $product = getAll("products");

                            if(mysqli_num_rows($product)>0)
                            {
                                foreach($product as $item)
                                {
                                    ?>
                                <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['product_title']; ?></td>
                                    <td>
                                        <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['product_title']; ?>">
                                    </td>
                                    <td><a href="editproduct.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a></td>
                                    <td>                       
                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Delete</button>

                                    </td>
                                </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                echo"No records found";
                            }
                            ?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>