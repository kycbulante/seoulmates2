<?php
session_start();
include('config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
   return $query_run = mysqli_query($con, $query);
}
function getBest($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE best='1'";
   return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id ='$id'";
   return $query_run = mysqli_query($con, $query);
}
function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id'";
   return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.product_title, p.image, p.price 
    FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    // $query = "SELECT c.id, p.id WHERE c.prod_id = p.id";
    return $query_run = mysqli_query($con, $query);
}   

function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE user_id='$userId'";
    return $query_run = mysqli_query($con, $query);
}
function redirect ($url,$message)
{
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit();
} 

function checkTrackingNoValid($trackingNo)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_id='$trackingNo' AND user_id='$userId'";
    return  mysqli_query($con, $query);
}
?>