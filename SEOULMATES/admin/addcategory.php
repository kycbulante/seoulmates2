<?php
include('../config/dbcon.php');
include('includes/header.php');
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
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="category_title" required placeholder="Enter Category Name">
                        </div>
                        <div class="col-md-12">
                            <label for="">Image</label>
                            <input type="file" class="form-control" required name="image">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary mt-2" name="add_category_btn" value="save">
                        </div>

                        
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>