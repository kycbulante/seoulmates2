<?php 
include('functions/userfunctions.php');
include("includes/header.php"); 
include("authenticate.php"); 
?>

<!-- <div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home/Groups</h6>
    </div>
</div> -->


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">GROUPS</h1>
                <div class="row">
                <?php
                    $categories = getAll("categories");

                    if(mysqli_num_rows($categories)>0)
                    {
                        foreach($categories as $item)
                        {
                        ?>
                            <div class="col-md-3 mb-2">
                                <a href="products.php?category=<?= $item['id']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                        <img src="uploads/<?= $item['category_image']; ?>" alt="Category Image" class="w-100 text-dark" style="height:200px">
                                        <h4 class="text-center text-dark"><?= $item['category_title']; ?></h4>
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

    
<?php include("includes/footer.php"); ?>