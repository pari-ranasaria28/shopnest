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
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="../style.css">
</head>
<body class="firstcolor">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img src="../images/shopnest_logo.png" alt="Loading image..." class = "logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class = "nav-link" >
                            <?php
        if(!isset($_SESSION['username'])){
          echo "Welcome Guest";
        }
        else{
          echo "Welcome ".$_SESSION['username']."";
        }
        ?>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>


    </div>
    <div class="secondcolor text-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <div class="row">
        <div class="col-md-12 firstcolor p-1 d-flex align-items-center">
            <div class = "px-3">
            <a href="#"><img src="../user/user_images/my_photo.jpg" alt="Loading" class = "admin-image"></a>
            <p class=" text-center">
            <?php
        if(!isset($_SESSION['username'])){
          echo "Welcome Guest";
        }
        else{
          echo "Welcome ".$_SESSION['username']."";
        }
        ?>
            </p>
            </div>
        
        <div class="button text-center container-fluid">
            <button class = "my-3"><a href="insert_product.php" class="nav-link secondcolor text-light p-2   my-1">Insert Products</a></button>
            <button><a href="index.php?view_products" class="nav-link secondcolor text-light p-2 my-1">View Products</a></button>
            <button><a href="index.php?insert_category" class="nav-link secondcolor text-light p-2 my-1">Insert Categories</a></button>
            <button><a href="index.php?view_categories" class="nav-link secondcolor text-light p-2 my-1">View Categories</a></button>
            <button><a href="index.php?insert_brand" class="nav-link secondcolor text-light p-2 my-1">Insert Brands</a></button>
            <button><a href="index.php?view_brands" class="nav-link secondcolor text-light p-2 my-1">View Brands</a></button>
            <button><a href="index.php?list_orders" class="nav-link secondcolor text-light p-2 my-1">All Orders</a></button>
            <button><a href="index.php?list_payments" class="nav-link secondcolor text-light p-2 my-1">All Payments</a></button>
            <button><a href="index.php?list_users" class="nav-link secondcolor text-light p-2 my-1">List Users</a></button>
            <button><a href="" class="nav-link secondcolor text-light p-2 my-1">Logout</a></button>
        </div>
        </div>
        </div>
    </div>
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_products'])){
            include('delete_products.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brand'])){
            include('edit_brand.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brand'])){
            include('delete_brand.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        ?>
    </div>
    <?php 
    include('../includes/footer.php');

    ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>