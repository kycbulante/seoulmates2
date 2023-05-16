<?php 

session_start();
include('../config/dbcon.php');

if (isset($_POST['adminregister_btn']))
{
    $adminname = mysqli_real_escape_string($con1,$_POST['adminname']);
    $adminphone = mysqli_real_escape_string($con1,$_POST['adminphone']);
    $adminemail = mysqli_real_escape_string($con1,$_POST['adminemail']);
    $adminpassword = mysqli_real_escape_string($con1,$_POST['adminpassword']);
    $hash_password=password_hash($adminpassword, PASSWORD_DEFAULT);
    $admincpassword = mysqli_real_escape_string($con1,$_POST['admincpassword']);

    // $insertadmin_query = "INSERT INTO admin (name,email,phone,password) VALUES ('$adminname','$adminemail','$adminphone','$adminpassword')";
    // $insertadmin_query_run = mysqli_query($con1, $insertadmin_query);

    // if($insertadmin_query_run)
    // {
    //     echo"<script>alert('hatdog')</script>";
    // }else{
    //     echo"<script>alert('hatdog1')</script>";
    // }

    // check email in database
    $check_email = "SELECT email FROM admin WHERE email='$adminemail'";
    $check_email_run = mysqli_query($con1,$check_email);

    if(mysqli_num_rows($check_email_run)>0)
    {
        $_SESSION['message'] = "Email already registered";
        header('Location: adminregister.php');
    }else
    {
        if($adminpassword == $admincpassword)
        {
            // Insert admin data
            $insertadmin_query = "INSERT INTO admin (name,email,phone,password) VALUES ('$adminname','$adminemail','$adminphone','$hash_password')";
            $insertadmin_query_run = mysqli_query($con1, $insertadmin_query);
    
            if( $insertadmin_query_run)
            {
                $_SESSION['message']="Registered successfully";
                header('Location: adminlogin.php');
            }
            else
            {
                $_SESSION['message']="Something went wrong";
                header('Location: adminregister.php');
            }
    
        }
        else
        {
            $_SESSION['message']="Passwords do not match";
            header('Location: adminregister.php');
        }
    }
}
else if (isset($_POST['adminlogin_btn']))
{
    $email = mysqli_real_escape_string($con1, $_POST['adminemail']);
    $password = mysqli_real_escape_string($con1, $_POST['adminpassword']);

    $adminlogin_query = "SELECT * FROM admin WHERE email = '$email'";
    $adminlogin_query_run = mysqli_query($con1, $adminlogin_query);
    $admindata =mysqli_fetch_array($adminlogin_query_run);

    if(mysqli_num_rows($adminlogin_query_run) > 0)
    {
        if(password_verify($password, $admindata['password'])){
        $_SESSION['admin'] = true;

        // $admindata =mysqli_fetch_array($adminlogin_query_run);
        $adminid = $admindata['id'];
        $adminname = $admindata['name'];
        $adminemail = $admindata['email'];

        $_SESSION['admin_user'] = [
            'user_id' => $adminid,
            'name' => $adminname,
            'email' => $adminemail
        ];

        $_SESSION['message'] = "Logged in Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: adminlogin.php');
    }
}
else
{
    $_SESSION['message'] = "Invalid Credentials";
    header('Location: adminlogin.php');
}
}

?>