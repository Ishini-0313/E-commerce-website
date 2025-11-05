<?php 
    include("../includes/connect.php");
    include("../functions/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!--  bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            User Login
        </h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_name">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_pwd" class="form-label">Password</label>
                        <input type="password" id="user_pwd" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_pwd">
                    </div>
                    <!-- login btn -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info border-0 py-2 px-3" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
    if(isset($_POST['user_login'])){
        $user_name = $_POST['user_name'];
        $pwd = $_POST['user_pwd'];
        $user_ip = get_client_ip();
        $select_qry = "select * from user_table where user_name = '$user_name'";
        $result = mysqli_query($con, $select_qry);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);

        //cart item
        $select_qry_cart = "select * from cart_details where ip_address = '$user_ip'";
        $result_cart = mysqli_query($con, $select_qry);
        $row_count_cart = mysqli_num_rows($result_cart);

        if($row_count > 0){
            $_SESSION['username']=$user_name;
            if(password_verify($pwd, $row_data['user_password'])){
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user_name;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['username']=$user_name;
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
                
            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
?>