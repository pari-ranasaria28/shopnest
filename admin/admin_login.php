<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow : hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_reg.png" alt="Admin Registration" class = "img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method = "post">
                    <div class="form-outline mb-4">
                        <label for="username" class = "form-label">Username</label>
                        <input type="text" id="username" name = "username" placeholder = "Enter your username" required = "required" class = "form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class = "form-label">Password</label>
                        <input type="password" id="password" name = "password" placeholder = "Enter your password" required = "required" class = "form-control">
                    </div>
                    <div>
                        <input type="submit" class = "my_button px-3 py-2 bg-info border-0" name = "admin_login" value = "Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class = "link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_login'])){
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    $select_query = "select * from `admin_table` where admin_name = '$admin_username'";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($row_count>0){
        $_SESSION['username'] = $admin_username;
        if(password_verify($admin_password,$row_data['admin_password'])){

                $_SESSION['username'] = $user_username;
                echo "<script>alert('Logged in successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid credentials')</script>";
    }
}

?>