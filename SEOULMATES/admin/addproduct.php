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
<div class ="container">
    <div classs="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                                <label for="">Select Category</label>
                                <select name = "category_id"class="form-select" >
                                <option selected>Select Category</option>
                                <?php 
                                    $categories = getAll("categories");

                                    if(mysqli_num_rows($categories) > 0)
                                {
                                    foreach($categories as $item){
                                        ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['category_title']; ?></option>
                                        <?php
                                    }       
                                }
                                else
                                {
                                    echo"NO category available";
                                }
                                
                                ?>
                                </select>
                            </div>  
                        <div class="col-md-12">
                            <label for="">Name</label>
                            <input type="text" class="form-control" required name="product_title" placeholder="Enter Product Name">
                        </div>
                        <div class="col-md-12">
                            <label for="">Product Description</label>
                            <textarea required name="product_description" class="form-control" placeholder="Enter product description" rows="3"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Price</label>
                            <input type="text" class="form-control" required name="price" placeholder="Enter Product Price">
                        </div>
                        <div class="col-md-12">
                            <label for="">Image</label>
                            <input type="file" class="form-control" required name="image">
                        </div>
                        <div class="col-md-6">
                            <label for="">Quantity</label>
                            <input type="text" class="form-control" required name="qty" placeholder="Enter Quantity">
                        </div>
                        <div class="row">
                        <div class="col-md-3">
                            <label for="">Best Album</label>
                            <input type="checkbox"  name="best">
                        </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary mt-2" name="add_product_btn" value="save">
                        </div>

                        
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>