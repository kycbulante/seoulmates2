<?php 
include('functions/userfunctions.php');
include("includes/header.php"); 
// include("authenticate.php"); 
?>

<div class="py-3">
    <div class="container product_data">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" style="color: #F89C8C;">Best Albums</h1>
                <hr>
                <div class="row">
                <?php
                    $products = getAll("products");

                    if(mysqli_num_rows($products)>0)
                    {
                        foreach($products as $item)
                        {
                        ?>
                            <div class="col-md-3 mb-2 text-center">
                                <a href="#">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100" style="height:200px">
                                        <h4 class="text-center text-dark"><?= $item['product_title']; ?></h4>
                                        <h4 class="text-center text-dark">PHP <?= $item['price']; ?></h4>
                                            <div class="input-group mb-3" style="width:130px">
                                            <!-- <button class="input-group-text decrement-btn">-</button> -->
                                            <input type="hidden" class="form-control text-center input-qty bg-white" value="1" disabled>
                                            <!-- <button class="input-group-text increment-btn">+</button> -->
                                            </div>
                                        <button class="btn btn-dark addToCartBtn" value="<?= $item['id']?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                                        </div>
                                    </div>
                                 </a>
                            </div>                     
                        <?php
                        }
                    }
                    else
                    {
                        echo"No data available";
                    }
                ?>
                </div>           
            </div>
        </div>
    </div>
</div>
<?php 

include("includes/footer.php"); ?>