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
            <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $product = getByID("products",$id);

                if(mysqli_num_rows($product) > 0)
                {
                    $data = mysqli_fetch_array($product);
                    ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Products</h4>
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
                                                <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item ['id']?'selected':'' ?> ><?= $item['category_title']; ?></option>
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
                                <input type="hidden" name="product_id" value="<?= $data['id']; ?>">  
                            <div class="col-md-12">
                                <label for="">Name</label>
                                <input type="text" value="<?= $data['product_title']; ?>" class="form-control" required name="product_title" placeholder="Enter Product Name">
                            </div>
                            <div class="col-md-12">
                                <label for="">Product Description</label>
                                <textarea required name="product_description" class="form-control" placeholder="Enter product description" rows="3"><?= $data['product_description']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Price</label>
                                <input type="text" value="<?= $data['price']; ?>" class="form-control" required name="price" placeholder="Enter Product Price">
                            </div>
                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                <input type="file" class="form-control" required name="image">
                                <label class="mb-0">Current Image</label>
                                <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px">
                            </div>
                            <div class="col-md-6">
                                <label for="">Quantity</label>
                                <input type="text" value="<?= $data['qty']; ?>" class="form-control" required name="qty" placeholder="Enter Quantity">
                            </div>
                            <div class="row">
                        <div class="col-md-3">
                            <label for="">Best Album</label>
                            <input type="checkbox"  name="best" <?= $data['best']=='0'?'':'checked' ?>>
                        </div>
                        </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" name="update_product_btn" value="Update">
                            </div>

                            
                        </div>
                    </form>
                    </div>
                </div>
            <?php 
                }
                else 
                {
                echo "Product not found";
                }
            }
            else 
            {
                echo "id missing from url";
            }
            
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>