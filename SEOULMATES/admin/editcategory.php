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
                    $category = getByID("categories", $id);

                    if(mysqli_num_rows($category)>0)
                    {

                        $data = mysqli_fetch_array($category);
                    ?>
                <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                            <label for="">Name</label>
                            <input type="text" value=" <?= $data['category_title'] ?>" class="form-control" name="category_title" placeholder="Enter Category Name">
                        </div>
                        <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['category_image']; ?>">
                                <input type="file" class="form-control" required name="image">
                                <label class="mb-0">Current Image</label>
                                <img src="../uploads/<?= $data['category_image']; ?>" alt="Category Image" height="50px" width="50px">
                            </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="update_category_btn" value="Update">
                        </div>

                        
                    </div>
                 </form>
                </div>
            </div>


            <?php
                    }
                    else
                    {
                        echo"Category not found";
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