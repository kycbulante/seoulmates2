<?php 
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}

include("includes/header.php"); 
?>

<div class="py-5">
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
                    <form action="functions/authcode.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Enter your name">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone eg. 0912 345 6789</label>
                        <input type="tel" name="phone" class="form-control" required pattern="[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" maxlength="11" placeholder="Enter your number">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" required placeholder="Enter your email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="Enter Password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" required placeholder="Confirm Password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleaddress" required placeholder="Enter your address">
                    </div>
                    
                    <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                    </form>



                </div>
            </div>

        </div>
    </div>
</div>
</div>


<?php include("includes/footer.php"); ?>