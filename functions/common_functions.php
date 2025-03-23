<?php

// function getproducts(){
//     global $con;

//     if(!isset($_GET['category'])){
//         if(!isset($_GET['brand'])){
//     $select_query = "select * from `products` order by rand() LIMIT 0,6";
//         $result_query=mysqli_query($con,$select_query);
//         while($row = mysqli_fetch_assoc($result_query)){
//           $product_id = $row['product_id'];
//           $product_title = $row['product_title'];
//           $product_description = $row['product_description'];
//           $product_image1 = $row['product_image1'];
//           $product_price = $row['product_price'];
//           $category_id = $row['Category_id'];
//           $brand_id = $row['Brand_id'];
//           echo "<div class='col-md-4 mb-2' >
//           <div class='card'>
//             <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
//             <div class='card-body'>
//               <h5 class='card-title'>$product_title</h5>
//               <p class='card-text'>$product_description</p>
//               <p class='card-text'>Price : $product_price/-</p>
//               <a href='index.php?add_to_cart=$product_id' class='btn thirdcolor text-dark'>Add to Cart</a>
//               <a href='product_details.php?product_id=$product_id' class='btn firstcolor'>View More</a>
//             </div>
//           </div>
//         </div>";
//         }
//     }
// }
// }

function getproducts(){
  global $con;

  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
          $select_query = "select * from `products` order by rand() LIMIT 0,6";
          $result_query = mysqli_query($con, $select_query);
          while($row = mysqli_fetch_assoc($result_query)){
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_description = $row['product_description'];
              $product_image1 = $row['product_image1'];
              $product_price = $row['product_price'];
              $category_id = $row['Category_id'];
              $brand_id = $row['Brand_id'];
              
              // Truncate the product description
              $short_description = strlen($product_description) > 100 ? substr($product_description, 0, 100) . "..." : $product_description;
              
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text' id='short-description-$product_id'>$short_description</p>
                  <p class='card-text' id='full-description-$product_id' style='display: none;'>$product_description</p>
                  <a href='#' class='read-more' data-product-id='$product_id'>Read More</a>
                  <p class='card-text'>Price : $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn thirdcolor text-dark'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn firstcolor'>View More</a>
                  </div>
              </div>
              </div>";
          }
      }
  }
}


function get_all_products(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "select * from `products` order by rand()";
        $result_query=mysqli_query($con,$select_query);
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['Category_id'];
          $brand_id = $row['Brand_id'];
          echo "<div class='col-md-4 mb-2' >
          <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price : $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn thirdcolor text-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn firstcolor'>View More</a>
            </div>
          </div>
        </div>";
        }
    }
}
}

function get_unique_categories(){
    global $con;
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
    $select_query = "select * from `products` where Category_id = $category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class = 'text-center'>Sorry! No stock available for this category</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['Category_id'];
          $brand_id = $row['Brand_id'];
          echo "<div class='col-md-4 mb-2' >
          <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price : $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn thirdcolor text-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn firstcolor'>View More</a>
            </div>
          </div>
        </div>";
        }
    }
}

function get_unique_brands(){
    global $con;
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
    $select_query = "select * from `products` where Brand_id = $brand_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class = 'text-center'>Sorry! No stock available for this brand.</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['Category_id'];
          $brand_id = $row['Brand_id'];
          echo "<div class='col-md-4 mb-2' >
          <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price : $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn thirdcolor text-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn firstcolor'>View More</a>
            </div>
          </div>
        </div>";
        }
    }
} 

function getcategories(){
    global $con;
    $select_categories = "Select * from `categories`";
            $result_categories = mysqli_query($con,$select_categories);
            while($row_data = mysqli_fetch_assoc($result_categories)){
              $category_title = $row_data['Category_title'];
              $category_id = $row_data['Category_id'];
              echo "<li class='nav-item'>
              <a href='index.php?category=$category_id' class = 'nav-link thirdcolor text-dark'>$category_title</a>
          </li>";
            }
}

function getbrands(){
    global $con;
    $select_brands = "Select * from `brands`";
            $result_brands = mysqli_query($con,$select_brands);
            while($row_data = mysqli_fetch_assoc($result_brands)){
              $brand_title = $row_data['Brand_title'];
              $brand_id = $row_data['Brand_id'];
              echo "<li class='nav-item'>
              <a href='index.php?brand=$brand_id' class = 'nav-link thirdcolor text-dark'>$brand_title</a>
          </li>";
            }
}

function search_product(){
    global $con;

        if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class = 'text-center'>No results found.</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['Category_id'];
          $brand_id = $row['Brand_id'];
          echo "<div class='col-md-4 mb-2' >
          <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price : $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn thirdcolor text-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn firstcolor'>View More</a>
            </div>
          </div>
        </div>";
        }
    }
}

function view_details(){
    global $con;

    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id = $_GET['product_id'];
    $select_query = "select * from `products` where product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_image3 = $row['product_image3'];
          $product_price = $row['product_price'];
          $category_id = $row['Category_id'];
          $brand_id = $row['Brand_id'];
          echo "<div class='col-md-4 mb-2' >
          <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price : $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn thirdcolor text-dark'>Add to Cart</a>
              <a href='index.php' class='btn firstcolor'>Go to Home</a>
            </div>
          </div>
        </div>
        <div class='col-md-8'>
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center mb-5'>More images</h4>
            </div>
            <div class='col-md-6'>
            <img src='./admin/product_images/$product_image2' class='card-img-top' alt='...'>
            </div>
            <div class='col-md-6'>
            <img src='./admin/product_images/$product_image3'  class='card-img-top' alt='...'>
            </div>
        </div>
    </div>";
        }
    }
}
}
}

function getIPAddress() {  
    //To check whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

// function cart(){
// if(isset($_GET['add_to_cart'])){
//   global $con;
//   $ip = getIPAddress();
//   $get_product_id=$_GET['add_to_cart'];
//   $select_query = "select * from `cart_details`where ip_address='$ip' and product_id = $get_product_id";
//   $result_query=mysqli_query($con,$select_query);
//   $num_of_rows = mysqli_num_rows($result_query);
//   if($num_of_rows>0){
//     echo "<script>alert('This item is already added to cart.')</script>";
//     echo "<script>window.open('index.php','_self')</script>";
//   }
//   else{
//     $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,'$ip',0)";
//     $result_query=mysqli_query($con,$insert_query);
//     echo "<script>alert('This item is added to your cart.')</script>";
//     echo "<script>window.open('index.php','_self')</script>";
//   }
// }
// }

function cart() {
  if (isset($_GET['add_to_cart'])) {
      global $con;
      $ip = getIPAddress();
      $get_product_id = $_GET['add_to_cart'];
      
      // Check if the item is already in the cart
      $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' AND product_id=$get_product_id";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      
      if ($num_of_rows > 0) {
          // Item is already in the cart
          echo "<script>alert('This item is already added to cart.')</script>";
          echo "<script>window.open('index.php', '_self')</script>";
      } else {
          // Insert the new item into the cart
          $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$ip', 1)";
          try {
              $result_query = mysqli_query($con, $insert_query);
              if ($result_query) {
                  echo "<script>alert('This item is added to your cart.')</script>";
                  echo "<script>window.open('index.php', '_self')</script>";
              } else {
                  throw new Exception("Failed to insert into cart: " . mysqli_error($con));
              }
          } catch (Exception $e) {
              echo "<script>alert('" . $e->getMessage() . "')</script>";
          }
      }
  }
}


function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    $select_query = "select * from `cart_details`where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items = mysqli_num_rows($result_query);
    }
    else{
      global $con;
    $ip = getIPAddress();
    $select_query = "select * from `cart_details`where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
  }

function total_cart_price(){
  global $con;
  $ip = getIPAddress();
  $total=0;
  $cart_query = "select * from`cart_details` where ip_address = '$ip'";
  $result_query = mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result_query)){
    $product_id=$row['product_id'];
    $select_products = "select * from `products` where product_id = $product_id ";
    $result_products = mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total+=$product_values;
    }
  }
  echo $total;
}

function get_user_order_details(){
  global $con;
  $username = $_SESSION['username'];
  $get_details = "select * from `user_table` where username = '$username'";
  $result_q = mysqli_query($con,$get_details);
  while($row_query = mysqli_fetch_array($result_q)){
    $user_id = $row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders = "select * from `user_order` where user_id = $user_id and order_status = 'pending'";
          $result_orders_query = mysqli_query($con,$get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<h3 class ='text-center mt-5 mb-2'>You have <span class = 'text-danger'>$row_count</span> pending orders</h3>
            <p class = 'text-center'><a href='profile.php?my_orders' class = 'text-dark'>Order Details</a></p>";
          }
          else{
            echo "<h3 class ='text-center mt-5 mb-2'>You have 0 pending orders</h3>
            <p class = 'text-center'><a href='../index.php?my_orders' class = 'text-dark'>Explore Products</a></p>";
          }
        }
      }
    }
  }
}

?>

<script>
// JavaScript to handle the "Read More" functionality
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.read-more').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-product-id');
            const shortDescription = document.getElementById('short-description-' + productId);
            const fullDescription = document.getElementById('full-description-' + productId);
            if (fullDescription.style.display === 'none') {
                fullDescription.style.display = 'block';
                shortDescription.style.display = 'none';
                this.textContent = 'Read Less';
            } else {
                fullDescription.style.display = 'none';
                shortDescription.style.display = 'block';
                this.textContent = 'Read More';
            }
        });
    });
});
</script>