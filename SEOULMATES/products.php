<?php 
include('functions/userfunctions.php');
include("includes/header.php"); 


if(isset($_GET['category']))
{
$category_name = $_GET['category'];
$category_data = getByID("categories",$category_name);
$category = mysqli_fetch_array($category_data);



if($category)
{
$cid = $category['id'];
?>


<!-- <div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">
                Home /
            </a>
            <a href="categories.php" class="text-white">
                Groups /
            </a>
            <?= $category['category_title']; ?></h6>
    </div>
</div> -->


<div class="py-3">
    <div class="container product_data">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center"><?= $category['category_title'];?></h2>
                <div class="row">
                <?php
                    $products = getProdbyCategory($cid);

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
}else
{echo "something went wrong";
}
}else{
echo "something went wrong";
}
include("includes/footer.php"); ?>