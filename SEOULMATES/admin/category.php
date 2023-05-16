<?php
include('../config/dbcon.php');
include('includes/header.php');
include('../functions/myfunctions.php');
// include("authenticate.php"); 
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
                    <h4>Categories</h4>
                </div>
                <div class="card-body" id="category_table">
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
                            $category = getAll("categories");

                            if(mysqli_num_rows($category)>0)
                            {
                                foreach($category as $item)
                                {
                                    ?>
                                <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['category_title']; ?></td>
                                    <td>
                                        <img src="../uploads/<?= $item['category_image']; ?>" width="50px" height="50px" alt="<?= $item['category_title']; ?>">
                                    </td>
                                    <td><a href="editcategory.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a></td>
                                    <td>
                                        <!-- <form action="code.php" method="POST">
                                            <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                            <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                        </form> -->
                                        <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']; ?>">Delete</button>

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