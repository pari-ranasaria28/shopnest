<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];
  $select_query="Select * from `categories` where Category_title='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number = mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('Category is already present inside the database')</script>";
  }
  else{
    $insert_query="insert into `categories`(Category_title) values ('$category_title')";
    $result = mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Category has been inserted successfully')</script>";
    }
  }
}
?>

<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text secondcolor" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class = " secondcolor border-0 p-2 my-3 text-light" name = "insert_cat" value = "Insert Categories">
    <!-- <button class = "secondcolor text-light p-2 m-3 border-0">Insert Categories</button> -->
</div>
</form>