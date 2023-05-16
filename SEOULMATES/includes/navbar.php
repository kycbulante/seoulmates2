<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #F89C8C;">
  <div class="container">
  <div class="logo">
      <a href="index.html"><img src="uploads/logos.png" alt="#"></a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Groups</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allproducts.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>

        <?php
          if(isset($_SESSION['auth']))
          {
        ?>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="my-orders.php">My Orders</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php
          }else
          {
        ?>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
         
        <?php
         }
        ?>

      </ul>
    </div>
  </div>
</nav>