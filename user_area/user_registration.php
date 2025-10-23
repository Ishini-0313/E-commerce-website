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
                </form>
            </div>
        </div>
    </div>
</body>
</html>