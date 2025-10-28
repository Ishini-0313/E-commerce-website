<?php 
    include("../includes/connect.php");
    include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!--  bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            New User Registration
        </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_name">
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control"   required="required" name="user_image">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_pwd" class="form-label">Password</label>
                        <input type="password" id="user_pwd" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_pwd">
                    </div>
                    <!--confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="confirm_pwd" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_pwd" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="confirm_pwd">
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="address">
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" id="contact" class="form-control" placeholder="Enter your contact number" autocomplete="off" required="required" name="contact">
                    </div>
                    <!-- register btn -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info border-0 py-2 px-3" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
    if(isset($_POST['user_register'])){
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_pwd = $_POST['user_pwd'];
        $confirm_pwd = $_POST['confirm_pwd'];
        $hash_pwd = password_hash($user_pwd,PASSWORD_DEFAULT);
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        $user_ip = get_client_ip();


        //select query
        $select_qry = "SELECT * FROM user_table WHERE user_name = '$user_name' OR user_email='$user_email'";
        $result = mysqli_query($con,$select_qry);
        $rows = mysqli_num_rows($result);
        if($rows>0){
            echo "<script>alert('Username  or email already exists')</script>";
        }
        elseif ($user_pwd!=$confirm_pwd) {
            echo "<script>alert('Passwords do not match')</script>";
        }
        else{
            //insert query
            move_uploaded_file($user_image_temp,"./user_images/$user_image");
            $insert_qry = "INSERT INTO user_table (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES 
            ('$user_name','$user_email','$hash_pwd','$user_image','$user_ip','$address','$contact')";

            $sql_execute = mysqli_query($con,$insert_qry);
        } 
    }
?>