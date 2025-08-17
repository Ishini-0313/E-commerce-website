<?php
    //connecting database
    include('./includes/connect.php');

    //getting products
    function getProducts(){
        global $con;
        $select_qry = "SELECT * FROM products order by rand() LIMIT 0,9";
                        $result = mysqli_query($con , $select_qry);
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['product_id'];
                            $title = $row['product_title'];
                            $desc = $row['product_description'];
                            //$keywords = $row['product_keywords'];
                            $img1 = $row['product_image1'];
                            $price = $row['product_price'];
                            $cat_id = $row['category_id'];
                            $br_id = $row['brand_id'];

                            echo "
                                <div class='col-md-4 mb-2'>
                                    <div class='card'>
                                        <img src='./admin_area/product_images/$img1' class='card-img-top' alt='$title '>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$title</h5>
                                            <p class='card-text'>$desc</p>
                                            <a href='#' class='btn btn-info'>Add to cart</a>
                                            <a href='#' class='btn btn-secondary'>View More</a>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
    }
?>