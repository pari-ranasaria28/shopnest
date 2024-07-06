<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $keyword = $_POST['keyword'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $price = $_POST['price'];
    $product_status = 'true';

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    if($product_title == '' || $description == '' || $keyword == '' || $product_category == '' || $product_brands == '' || $price == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == ''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        $stmt = $con->prepare("INSERT INTO `products` (product_title, product_description, product_keywords, Category_id, Brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
        $stmt->bind_param("sssissssds", $product_title, $description, $keyword, $product_category, $product_brands, $product_image1, $product_image2, $product_image3, $price, $product_status);

        if($stmt->execute()){
            echo "<script>alert('Product inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert product')</script>";
        }

        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light"> 
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method = "post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword" class="form-label">Product keywords</label>
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title = $row['Category_title'];
                        $category_id = $row['Category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title = $row['Brand_title'];
                        $brand_id= $row['Brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter price of product" autocomplete="off" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3 secondcolor text-light my_button" value="Add Product">
            </div>
        </form>
    </div>
</body>
</html>


<!-- <?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $keyword = $_POST['keyword'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $price = $_POST['price'];
    $product_status = 'true';

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    if($product_title == '' || $description == '' || $keyword == '' || $product_category == '' || $product_brands == '' || $price == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == ''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        $stmt = $con->prepare("INSERT INTO `products` (product_title, product_description, product_keywords, Category_id, Brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
        $stmt->bind_param("sssissssds", $product_title, $description, $keyword, $product_category, $product_brands, $product_image1, $product_image2, $product_image3, $price, $product_status);

        if($stmt->execute()){
            echo "<script>alert('Product inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert product')</script>";
        }

        $stmt->close();
    }
}
?> -->
