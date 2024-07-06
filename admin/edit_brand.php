<?php

if(isset($_GET['edit_brand'])){
    $edit_brand = $_GET['edit_brand'];

    $get_brands= "select * from `brands` where brand_id = $edit_brand";
    $result = mysqli_query($con,$get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['Brand_title'];
}

if(isset($_POST['edit_brand'])){
    $brand_title = $_POST['brand_title'];

    $update_query = "update `brands` set brand_title = '$brand_title' where brand_id = $edit_brand";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo "<script>alert('Brand updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }


}

?>


<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="barnd_title" class="form-label">Brand Title</label>
            <input type="text" value = "<?php  echo $brand_title;?>" name = "brand_title" class="form-control" required = "required">
        </div>
        <input type="submit" value = "Update Brand" class ="my_button text-light px-3 mb-3" name = "edit_brand">

    </form>
</div>