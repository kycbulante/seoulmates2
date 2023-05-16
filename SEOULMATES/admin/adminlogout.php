<?php
session_start();

if(isset($_SESSION['admin']))
{
    unset($_SESSION['admin']);
    unset($_SESSION['admin_user']);
    $_SESSION['message'] = "Logged Out Successfully";
}

header('Location:index.php');
?>