<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid firstcolor p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid" >
      <img src="./images/shopnest_logo.png" alt="Loading logo..." class="logo">
    <a class="navbar-brand" href="#">ShopNest</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart <i class="fa-solid fa-cart-shopping"></i><sup><?php
            cart_item();
            ?></sup></a>
        </li>
      </ul>
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
            echo "<li class='nav-item'>
            <a class='nav-link text-light' href='./user/user_login.php'>Login</a>
          </li>";
          }
          else{
            echo "<li class='nav-item'>
            <a class='nav-link text-light' href='logout.php'>Logout</a>
          </li>";
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


<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-border text-center">
            <tbody>
                <?php
                     $ip = getIPAddress();
                     $total=0;
                     $cart_query = "select * from`cart_details` where ip_address = '$ip'";
                     $result_query = mysqli_query($con,$cart_query);
                     $result_count = mysqli_num_rows($result_query);
                     if($result_count>0){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";
                     while($row=mysqli_fetch_array($result_query)){
                       $product_id=$row['product_id'];
                       $select_products = "select * from `products` where product_id = $product_id ";
                       $result_products = mysqli_query($con,$select_products);
                       while($row_product_price=mysqli_fetch_array($result_products)){
                         $product_price = array($row_product_price['product_price']);
                         $price_table = $row_product_price['product_price'];
                         $product_title = $row_product_price['product_title'];
                         $product_image1 = $row_product_price['product_image1'];
                         $product_values = array_sum($product_price);
                         $total+=$product_values;
                ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin/product_images/<?php echo $product_image1?>" alt="" class = "cart_image"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                    $ip = getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities = $_POST['qty'];
                        $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$ip'";
                        $result_=mysqli_query($con,$update_cart);
                        $total = $quantities*$total;
                    }
                    
                    ?>
                    <td><?php echo $price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value = "<?php
                    echo $product_id
                    ?>"></td>
                    <td>
                    <input type="submit" value = "Update Cart" class="my_button text-light px-3" name="update_cart">
                    <input type="submit" value = "Remove" class="my_button text-light px-3" name="remove_cart">
                </tr>
                <?php }}
                     }

                     else{
echo "<h2 class = 'text-center'>Cart is empty.</h2>";
                     }
                     ?>
            </tbody>
        </table>

        <div class = "d-flex mb-3">
            <?php
             $ip = getIPAddress();
             $cart_query = "select * from`cart_details` where ip_address = '$ip'";
             $result_query = mysqli_query($con,$cart_query);
             $result_count = mysqli_num_rows($result_query);
             if($result_count>0){
                echo "<h4 class='px-3'>Subtotal :<strong> $total/-</strong> </h4>
                <input type='submit' value = 'Continue Shopping' class='my_button text-light px-3' name='continue_shopping'>
                <button class='my_button text-light px-3'><a href='./user/checkout.php' class = 'text-light text-decoration-none'>Checkout</a></button>";
             }
             else{
              echo "<input type='submit' value = 'Continue Shopping' class='my_button text-light px-3' name='continue_shopping'>";
             }
             if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
             }
            ?>
            
        </div>
    </div>
</div>
</form>

<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query = "delete from `cart_details` where product_id = $remove_id";
            $run_delete = mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}


echo $remove_item = remove_cart_item();
?>

<?php
include("./includes/footer.php");
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>