<?php
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

//adding category to database
if(isset($_POST['add_category_btn']))
{
    $category_title=$_POST['category_title'];
    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

//select data from database (to avoid redundant category)
    $select_query="Select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number>0)
    {
        
        echo"<script>alert('This category has already been added')</script>";
        echo"<script>window.open('addcategory.php','_self')</script>";
    }
    else
    {
//adding categories to database
    $insert_query="insert into `categories` (category_title,category_image) values ('$category_title', '$filename')";
    $result=mysqli_query($con,$insert_query);
        if($result)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            echo"<script>alert('Category has been inserted successfully')</script>";
            echo"<script>window.open('addcategory.php','_self')</script>";
        }
    }
}
else if(isset($_POST['update_category_btn']))
{
   $category_id=$_POST['category_id'];
    $category_title=$_POST['category_title'];

    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_filename= $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename=$old_image;
    } 

    $update_query="update `categories` set category_title='$category_title', category_image='$update_filename' where id='$category_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        
        echo"<script>alert('category updated')</script>";
        echo"<script>window.open('editcategory.php?id=$category_id','_self')</script>";
    }
}
else if (isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con,$_POST['category_id']);

    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        // echo"<script>alert('category deleted')</script>";
        // echo"<script>window.open('category.php','_self')</script>";

        echo 200;
    }
    else
    {
        echo 500;
    }
}
else if (isset($_POST['add_product_btn']))
{
    $category_id = $_POST['category_id'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $best = isset($_POST['best']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $product_query = "INSERT INTO products (category_id,product_title, product_description, price, qty, best, image)
    VALUES ('$category_id','$product_title', '$product_description', '$price', '$qty', '$best','$filename')";

    $product_query_run = mysqli_query($con, $product_query);

    if($product_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        echo"<script>alert('Product added')</script>";
        echo"<script>window.open('addproduct.php','_self')</script>";
    }
    else{
        echo"<script>alert('Something went wrong')</script>";
    }
}
else if (isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $best = isset($_POST['best']) ? '1':'0';
    
    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_filename= $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename=$old_image;
    }
    $update_product_query = "UPDATE products SET category_id='$category_id', product_title = '$product_title', product_description='$product_description', price='$price', qty='$qty', best='$best', image='$update_filename' WHERE id='$product_id'";
    $update_product_query_run = mysqli_query($con,$update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        
        echo"<script>alert('Product Updated')</script>";
        echo"<script>window.open('product.php','_self')</script>";
    }

}
else if(isset($_POST['delete_product_btn']))
{
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con,$product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = " DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
        // echo"<script>alert('product Deleted')</script>";
        // echo"<script>window.open('product.php','_self')</script>";

        echo 200;
    }
    else
    {
        // echo"<script>alert('product not Deleted')</script>";
        // echo"<script>window.open('product.php','_self')</script>";
        echo 500;
    }

}
else if(isset($_POST['update_order_btn']))
{
   $track_no = $_POST['tracking_no'];
   $order_status = $_POST['order_status'];

   $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE tracking_id='$track_no'";
   $updateOrder_query_run = mysqli_query($con, $updateOrder_query);

   echo"<script>alert('Order Status Updated')</script>";
   echo"<script>window.open('view-order.php?t=$track_no','_self')</script>";
}
else
{
    header('Location: ../index.php');
}
?>