<?php 

session_start();
include('../config/dbcon.php');

//for register
if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $hash_password=password_hash($password, PASSWORD_DEFAULT);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
    $address = mysqli_real_escape_string($con,$_POST['address']);

    //check email in database
    $check_email = "SELECT email FROM users WHERE email='$email'";
    $check_email = mysqli_query($con,$check_email);

    if(mysqli_num_rows($check_email)>0)
    {
        $_SESSION['message'] = "Email already registered";
        header('Location: ../register.php');
    }else
    {
        if($password == $cpassword)
        {
            // Insert user data
            $insert_query = "INSERT INTO users (name,email,phone,password, address) VALUES ('$name','$email','$phone','$hash_password','$address')";
            $insert_query_run = mysqli_query($con, $insert_query);
    
            if( $insert_query_run)
            {
                $_SESSION['message']="registered successfully";
                header('Location: ../login.php');
            }
            else
            {
                $_SESSION['message']="something went wrong";
                header('Location: ../register.php');
            }
    
        }
        else
        {
            $_SESSION['message']="Passwords do not match";
            header('Location: ../register.php');
        }
    }


   
}
else if (isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email'";
    $login_query_run = mysqli_query($con, $login_query);
    // $row_data=mysqli_fetch_assoc($login_query_run);
    $userdata =mysqli_fetch_array($login_query_run);

    if(mysqli_num_rows($login_query_run) > 0)
        {
             if(password_verify($password, $userdata['password'])){
        
            $_SESSION['auth'] = true;

            // $userdata =mysqli_fetch_array($login_query_run);
            $userid = $userdata['id'];
            $username = $userdata['name'];
            $useremail = $userdata['email'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $username,
                'email' => $useremail
            ];

            $_SESSION['message'] = "Logged in Successfully";
            header('Location: ../index.php');
        }
        else
            {
                $_SESSION['message'] = "Invalid Credentials";
                header('Location: ../login.php');
            }
    }
    else
            {
                $_SESSION['message'] = "Invalid Credentials";
                header('Location: ../login.php');
            }
    
}
?>