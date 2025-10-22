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
            object-fit:contain;
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
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        
                            <!-- php code to display dynamic data -->
                            <?php
                                global $con;
                                $ip = get_client_ip();
                                $total_price = 0;
                                $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
                                $result = mysqli_query($con, $cart_query);
                                $result_count = mysqli_num_rows($result);
                                if($result_count>0){
                                    echo "<thead>
                                            <th>Product Title</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                            <th>Options</th>
                                        </thead>
                                    <tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    $product_id = $row['product_id'];
                                    $select_product = "SELECT * FROM products WHERE product_id = $product_id";
                                    $result_product = mysqli_query($con, $select_product);
                                    while($row_product_price = mysqli_fetch_array($result_product)){
                                        $product_price = array($row_product_price['product_price']);
                                        $price = $row_product_price['product_price'];
                                        $product_title = $row_product_price['product_title'];
                                        $product_image = $row_product_price['product_image1'];
                                        $products_value = array_sum($product_price);
                                        $total_price += $products_value;
                            ?>
                            <tr>
                                <td><?php echo $product_title?></td>
                                <td><img src="./admin_area/product_images/<?php echo $product_image?>" alt="" class="cart_img"></td>
                                <td><input type="text" name="qty" class="form-input w-50"></td>
                                <?php
                                    $ip = get_client_ip();
                                    if(isset($_POST['update_cart'])){
                                        $quantity = $_POST['qty'];
                                        $update_query = "UPDATE cart_details SET quantity=$quantity WHERE ip_address='$ip'";
                                        $update_query_result = mysqli_query($con,$update_query);
                                        $total_price = $total_price*$quantity;
                                    }
                                ?>
                                <td><?php echo $price?>/-</td>
                                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                                <td>
                                    <input type="submit" value="Update Cart" class="px-3 py-2 bg-info border-0 mx-3" name="update_cart">
                                    <input type="submit" value="Remove Cart" class="px-3 py-2 bg-info border-0 mx-3" name="remove_cart">
                                </td>
                            </tr>
                            <?php }}} 
                                else{
                                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex mb-5">
                        <h4  class="px-3">Subtotal: <strong class="text-info"><?php echo $total_price?>/-</strong></h4>
                        <a href="index.php"><button class="px-3 py-2 bg-info border-0 mx-3">Continue Shopping</button></a>
                        <a href="#"><button class="px-3 py-2 bg-secondary border-0 text-light">Checkout</button></a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- function to remove item -->
        <?php 
            function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id){
                        echo $remove_id;
                        $delete_query = "DELETE FROM cart_details WHERE product_id = $remove_id";
                        $run_delete = mysqli_query($con,$delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php','_self');</script>";
                        }
                    }
                }
            }
            echo $remove_item = remove_cart_item();
        ?>
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