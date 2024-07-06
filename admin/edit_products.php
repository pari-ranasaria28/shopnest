<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "select * from `products` where product_id = $edit_id";
    $result = mysqli_query($con,$get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $Category_id = $row['Category_id'];
    $Brand_id = $row['Brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    $select_category = "select * from `categories` where Category_id =$Category_id";
    $result_category = mysqli_query($con,$select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    // $category_title = $row_category['Category_title'];

    $select_brand = "select * from `brands` where Brand_id =$Brand_id";
    $result_brand = mysqli_query($con,$select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    // $brand_title = $row_brand['Brand_title'];
}


?>


<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method = "post" enctype = "multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value = "<?php echo $product_title?>" name = "product_title" class = "form-control" required = "required"> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value = "<?php echo $product_description?>" name = "product_description" class = "form-control" required = "required"> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value = "<?php echo $product_keywords?>" name = "product_keywords" class = "form-control" required = "required"> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option><?php echo "Select Category" ?></option>
                <?php
                $select_category_all = "select * from `categories`";
                $result_category_all = mysqli_query($con,$select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                    $category_title = $row_category_all['Category_title'];
                    $Category_id = $row_category_all['Category_id'];
                    echo "<option value='$Category_id'>$category_title</option>";
                }
                ?>
            </select> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brand" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select">
                <option><?php echo "Select Brand" ?></option>
                <?php
                $select_brand_all = "select * from `brands`";
                $result_brand_all = mysqli_query($con,$select_brand_all);
                while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                    $brand_title = $row_brand_all['Brand_title'];
                    $brand_id = $row_brand_all['Brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name = "product_image1" class = "w-90 m-auto form-control" required = "required"> 
            <img src="./product_images/<?php echo $product_image1?>" alt="" class="edit_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name = "product_image2" class = "w-90 m-auto form-control" required = "required"> 
            <img src="./product_images/<?php echo $product_image2?>" alt="" class="edit_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name = "product_image3" class = "w-90 m-auto form-control" required = "required"> 
            <img src="./product_images/<?php echo $product_image3?>" alt="" class="edit_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value ="<?php echo $product_price?>" name = "product_price" class = "form-control" required = "required"> 
        </div>
        <div class="text-center w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product" class="my_button text-light px-3 mb-3">
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price==''){
        echo "<script>alert('Please fill all the fields and continue.')</script>";
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        $update_product = "update `products` set category_id = '$product_category',product_title = '$product_title',Brand_id = '$product_brand',product_image1 = '$product_image1',product_image2 = '$product_image2',product_image3 = '$product_image3',product_price = '$product_price',date = NOW() where product_id = $edit_id";
        $result_update = mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
    }
}

?>