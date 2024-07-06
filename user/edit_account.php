<?php
if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from `user_table` where username = '$user_session_name'";
    $result_query = mysqli_query($con,$select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];

    // if(isset($_POST['user_update'])){
    //     $update_id = $user_id;
    //     $usernames = $_POST['user_username'];
    //     $users_email = $_POST['user_email'];
    //     $users_address = $_POST['user_address'];
    //     $users_mobile = $_POST['user_mobile'];

    //     $user_image = $_FILES['user_image']['name'];
    //     $user_image_temp = $_FILES['user_image']['tmp_name'];
    //     move_uploaded_file($user_image_temp,"./user_images/$user_image");
    //     $update_data = "update `user_table` set username = '$usernames',user_email = '$users_email',user_image = '$user_image',user_address = '$users_address',user_mobile = '$users_mobile' where user_id = $update_id";
    //     $result_query_update = mysqli_query($con,$update_data);
    //     if($result_query_update){
    //         echo "<script>alert('data updated successfully')</script>";
    //         echo "<script>window.open('logout.php','_self')</script>";
    //     }
    // }
    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $usernames = $_POST['user_username'];
        $users_email = $_POST['user_email'];
        $users_address = $_POST['user_address'];
        $users_mobile = $_POST['user_mobile'];
    
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
    
        // Debugging: Check if the file is uploaded correctly
        if(move_uploaded_file($user_image_temp, "./user_images/$user_image")){
            echo "File uploaded successfully.<br>";
        } else {
            echo "Failed to upload file.<br>";
            echo "Error code: " . $_FILES['user_image']['error'] . "<br>";
        }

        $update_data = "UPDATE `user_table` SET username = '$usernames', user_email = '$users_email', user_image = '$user_image', user_address = '$users_address', user_mobile = '$users_mobile' WHERE user_id = $update_id";
        $result_query_update = mysqli_query($con, $update_data);
        if($result_query_update){
            echo "<script>alert('data updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopNest</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h3 class="mb-4">Edit Profile</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="form-outline d-flex mb-4 w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src='./user_images/<?php echo $user_image3?>' class='edit_img' alt='Loading....Please wait'>;
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="my_button text-light px-3 py-2" name="user_update">
    </form>
</body>
</html>