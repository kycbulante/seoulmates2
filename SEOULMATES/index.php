<?php 
include('functions/userfunctions.php');
include("includes/header.php"); 
// include("authenticate.php"); 
?>
<link href="assets/css/custom.css" rel="stylesheet">
<!-- Main -->
                    <div id="main">
                    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="slider/twice.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slider/t-ara.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slider/sk.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slider/exo.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slider/blackpink.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="py-3">
    <div class="container product_data">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" style="color: #F89C8C;">Best Albums</h1>
                <hr>
                <div class="row">
                <?php
                    $products = getBest("products");

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
                                            <!-- <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled> -->
                                            <!-- <button class="input-group-text increment-btn">+</button> -->
                                            </div>
                                        <!-- <button class="btn btn-primary addToCartBtn" value="<?= $item['id']?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button> -->
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