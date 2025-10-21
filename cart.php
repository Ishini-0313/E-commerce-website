<?php
    include('includes/connect.php');
    include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ecommerce Website-Cart Details</title>

    <!--  bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>
    <!-- nav bar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-liht bg-info">
            <div class="container-fluid">
                <img src="./images/pngtree-colorful-shopping-cart-logo-vector-png-image_6969977.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contacts</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
                            </li>                           
                    </ul>                   
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php
            cart();
        ?>

        <!-- second child -->
         <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li> 
            </ul>
         </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">
                Communication is at the heart of e-commerce and community
            </p>
        </div>

        <!-- fourth child - table -->
        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                        <td>Apple</td>
                        <td><img src="./images/apple1.jpg" alt="" class="cart_img"></td>
                        <td><input type="text"></td>
                        <td>100</td>
                        <td><input type="checkbox"></td>
                        <td>
                            <button class="px-3 py-2 bg-info border-0 mx-3">Update</button>
                            <button class="px-3 py-2 bg-info border-0 mx-3">Remove</button>
                        </td>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <h4  class="px-3">Subtotal: <strong class="text-info">5000/-</strong></h4>
                    <a href="index.php"><button class="px-3 py-2 bg-info border-0 mx-3">Continue Shopping</button></a>
                    <a href="#"><button class="px-3 py-2 bg-secondary border-0 text-light">Checkout</button></a>
                </div>
            </div>
        </div>

        <!-- last child -->
        <!-- include footer -->
        <?php
            include('includes/footer.php');
        ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>