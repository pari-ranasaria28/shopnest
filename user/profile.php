<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-fluid firstcolor p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid" >
      <img src="../images/shopnest_logo.png" alt="Loading logo..." class="logo">
    <a class="navbar-brand" href="#">ShopNest</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Cart <i class="fa-solid fa-cart-shopping"></i><sup><?php
            cart_item();
            ?></sup></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            Total : <?php
            total_cart_price();
            ?>/-
          </a>
        </li>
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class = "btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<nav class = "navbar navbar-expand-lg navbar-dark secondcolor">
    <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='#'>Welcome Guest</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class = 'nav-item'><a class = 'nav-link text-light' href = './user/user_login.php'>Login</a> </li>";
        }
        else{
          echo "<li class = 'nav-item'><a class = 'nav-link text-light' href = './user/logout.php'>Logout</a> </li>";
        }
        ?>
    </ul>
</nav>

<?php
cart();
?>

<div>
    <h3 class="text-center">Store items</h3>
    <p class="text-center">Buy your favourite items from our web.</p>
</div>


<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav text-center text-light secondcolor view_height">
            <li class ="nav-item"><a class = "nav-link my-4" href="#"><h4>My profile</h4></a></li>
            <?php
            $username = $_SESSION['username'];
            $user_image = "select * from `user_table` where username = '$username'";
            $user_image2 = mysqli_query($con,$user_image);
            $row_image = mysqli_fetch_array($user_image2);
            $user_image3 = $row_image['user_image'];
            echo "<li class='nav-item'>
            <img src='./user_images/$user_image3' class='profile_img' alt='Loading....Please wait'>
        </li>";

            ?>
            <li class ="nav-item"><a class = "nav-link" href="profile.php">Pending Orders</a></li>
            <li class ="nav-item"><a class = "nav-link" href="profile.php?edit_account">Edit Profile</a></li>
            <li class ="nav-item"><a class = "nav-link" href="profile.php?my_orders">My orders</a></li>
            <li class ="nav-item"><a class = "nav-link" href="profile.php?delete_account">Delete Account</a></li>
            <li class ="nav-item"><a class = "nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php
        get_user_order_details();
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
          include('user_orders.php');
      }
      if(isset($_GET['delete_account'])){
        include('delete_account.php');
    }
        ?>
    </div>
</div>



<?php
include("../includes/footer.php");
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>