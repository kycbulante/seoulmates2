<?php 
// session_start();

// if(isset($_SESSION['admin']))
// {
//     $_SESSION['message'] = "You are already logged in";
//     header('Location: index.php');
//     exit();
// }

include("includes/header.php");
include('../config/dbcon.php');
?>

<div class="py-3">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_SESSION['message']))
            {?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            <?php
            unset($_SESSION['message']);
            }?>
            <div class="card">
                <div class="card-header">
                <h4>Registration Form</h4>
                </div>
                <div class="card-body">
                    <form action="adminauthcode.php" method="POST">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="adminname" class="form-control" placeholder="Enter your name">
                       
                    </div>                
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone eg. 0912 345 6789</label>
                        <input type="tel" name="adminphone" class="form-control" required pattern="[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" maxlength="11" placeholder="Enter your number">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="adminemail" class="form-control" placeholder="Enter your email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="adminpassword" class="form-control" placeholder="Enter Password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="admincpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                    </div>
                    
                    <button type="submit" name="adminregister_btn" class="btn btn-primary">Register</button>
                    </form>



                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php
// if(isset($_POST['adminregister_btn'])){
//     $admin_name=$_POST['adminname'];
//     $admin_email=$_POST['adminemail'];
//     $admin_phone=$_POST['adminphone'];
//     $admin_password = $_POST['adminpassword'];
//     // $conf_user_password=$_POST['confpassword'];
    
//     // $select_query="Select * from `admin` where name= '$admin_name' or email='$admin_email'";
//     // $result=mysqli_query($con1,$select_query);
//     // $rows_count=mysqli_num_rows($result);
//     // if($rows_count>0){
//     //     echo"<script>alert('username and email exists')</script>";
//     // }else if($admin_password!=$conf_user_password){
//     //     echo"<script>alert('passwords do not match')</script>";
//     // }else{
//         $insert_query="insert into `admin` (name, phone, email, password) 
//         values ('$admin_name','$admin_phone', '$admin_email','$admin_password')";
//         $sql_execute=mysqli_query($con1,$insert_query);
    
//         if($sql_execute){
//             echo"<script>alert('data inserted successfully')</script>";
//         }else{
//             die(mysqli_error($con1));
//         }
//     }
//     // }
//     ?>


<?php include("includes/footer.php"); ?>