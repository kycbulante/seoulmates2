<?php

$page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
session_start();

?>




<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 font-weight-bold text-white">Seoulmates</span><br>
        <?php
          if(isset($_SESSION['admin']))
          {
        ?>
        <span class="ms-1 font-weight-bold text-white">Admin <?= $_SESSION['admin_user']['name']; ?> </span>
         <?php
          }
        ?>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"  style="overflow-y:hidden">
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link text-white <?= $page == "index.php"? 'active bg-gradient-primary':''?>" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1"></span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "category.php"? 'active bg-gradient-primary':''?>" href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10"></i> -->
            </div>
            <span class="nav-link-text ms-1">All Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "addcategory.php"? 'active bg-gradient-primary':''?>" href="addcategory.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
            </div>
            <span class="nav-link-text ms-1">Add Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "product.php"? 'active bg-gradient-primary':''?>" href="product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
            </div>
            <span class="nav-link-text ms-1">All Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "addproduct.php"? 'active bg-gradient-primary':''?>" href="addproduct.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
            </div>
            <span class="nav-link-text ms-1">Add Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "orders.php"? 'active bg-gradient-primary':''?>" href="orders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
      <?php
          if(isset($_SESSION['admin']))
          {
        ?>
        <a class="btn bg-gradient-primary mt-4 w-100" href="adminlogout.php" type="button">Logout</a>
        <?php
          }
          else
          {         
        ?>
          <a class="btn bg-gradient-primary mt-4 w-100" href="adminlogin.php" type="button">Login</a>
          <a class="btn bg-gradient-primary w-100" href="adminregister.php" type="button">Register</a>
         <?php
         }
        ?>
      </div>
    </div>
  </aside>