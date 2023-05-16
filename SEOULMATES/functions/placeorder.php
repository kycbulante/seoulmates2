<?php
session_start();
include('../config/dbcon.php');

if(isset($_SESSION['auth']))
{
    if(isset($_POST['placeOrderBtn']))
    {
        
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $pincode = mysqli_real_escape_string($con,$_POST['pincode']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $payment_mode = mysqli_real_escape_string($con,$_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con,$_POST['payment_id']);

        $userId = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.product_title, p.image, p.price 
        FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
        $query_run = mysqli_query($con, $query);

        $totalPrice = 0;
                        foreach($query_run as $citem)
                        {
                            
                            $totalPrice += $citem['price'] * $citem['prod_qty'];
                            
                            // echo $citem['product_title'];
                        }
        $tracking_id = "seoulmates".rand(1111,9999);
        $insert_query = "INSERT INTO orders (tracking_id, user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) 
        VALUES ('$tracking_id','$userId','$name', '$email', '$phone', '$address', '$pincode','$totalPrice','$payment_mode','$payment_id' )";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $order_id = mysqli_insert_id($con);

            foreach($query_run as $citem)
            {
            $prod_id = $citem['prod_id'];
            $prod_qty = $citem['prod_qty'];
            $price = $citem['price'];
            $insert_item_query = "INSERT INTO order_items (order_id, prod_id, qty, price) 
            VALUES('$order_id','$prod_id', ' $prod_qty', '$price')";
            $insert_item_query_run = mysqli_query($con,$insert_item_query);


            $product_query ="SELECT * FROM products WHERE id ='$prod_id'";
            $product_query_run = mysqli_query($con, $product_query);

            $productData = mysqli_fetch_array($product_query_run);
            $currentqty = $productData['qty'];

            $new_qty = $currentqty - $prod_qty;

            $updateQty = "UPDATE products SET qty = '$new_qty' WHERE id = '$prod_id'";
            $updateQty_run = mysqli_query($con,$updateQty);
            }

            $delete_cart = "DELETE FROM carts WHERE user_id='$userId'";
            $delete_cart_run = mysqli_query($con,$delete_cart);


            if($payment_mode == "COD")
           {
            echo"<script>alert('Order Placed')</script>";
            echo"<script>window.open('../my-orders.php','_self')</script>";
            die();
           }
           else 
            {
                echo 201;
            }
        }
    }
}
else
{
    header('Location: ../index.php');
}
?>