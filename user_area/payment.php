<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!--  bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

    <style>
        img{
            width: 90%;
            margin:auto;
            display:block;
        }
    </style>

</head>
<body>
    <!-- php code to access the user id -->
    <?php
        $user_ip=get_client_ip();
        $get_user = "select * from user_table where user_ip='$user_ip'";
        $result = mysqli_query($con,$get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">
            Payment Options
        </h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com"><img src="../images/upi.jpeg" target="_blank" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>