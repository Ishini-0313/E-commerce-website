<?php
    //connecting database
    include('./includes/connect.php');

    //getting products
    function getProducts(){
        global $con;
        //condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                $select_qry = "SELECT * FROM products order by rand() LIMIT 0,3";
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
                                            <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
            }
        }
    }

    //get all products
    function get_all_products(){
        global $con;

        //condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                $select_qry = "SELECT * FROM products order by rand()";
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
        }
    }

    //getting unique category
    function get_unique_categories(){
        global $con;

        //condition to check isset or not
        if(isset($_GET['category'])){
            $category_id = $_GET['category'];
            $select_qry = "SELECT * FROM products WHERE category_id = $category_id";
            $result = mysqli_query($con , $select_qry);
            $no_of_rows = mysqli_num_rows($result);
            if($no_of_rows==0){
                echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
            }

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
    }

    //getting unique brand
    function get_unique_brands(){
        global $con;

        //condition to check isset or not
        if(isset($_GET['brand'])){
            $brand_id = $_GET['brand'];
            $select_qry = "SELECT * FROM products WHERE brand_id = $brand_id";
            $result = mysqli_query($con , $select_qry);
            $no_of_rows = mysqli_num_rows($result);
            if($no_of_rows==0){
                echo "<h2 class='text-center text-danger'>This brand is not available for service</h2>";
            }

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
    }


    //displaying brands inside nav
    function getBrands(){
        global $con;
        $select_brands = "SELECT * FROM brands";
                        $result_brands = mysqli_query($con , $select_brands);
                        while($row_data = mysqli_fetch_assoc($result_brands)){
                            $brand_title = $row_data['brand_title'];
                            $brand_id = $row_data['brand_id'];
                            echo "<li class='nav-item '>
                                    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                                </li>";
                        }
    }

    //displaying categories inside nav
    function getCategories(){
        global $con;
        $select_categories = "SELECT * FROM categories";
                        $result_categories = mysqli_query($con , $select_categories);
                        while($row_data = mysqli_fetch_assoc($result_categories)){
                            $category_title = $row_data['category_title'];
                            $category_id = $row_data['category_id'];
                            echo "<li class='nav-item '>
                                    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                                </li>";
                        }
    }

    //searching products
    function search_product(){
        global $con;
        if(isset($_GET['search_data_product'])){
            $search_data_value = $_GET['search_data'];
            $search_qry = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
            $result = mysqli_query($con , $search_qry);
            $no_of_rows = mysqli_num_rows($result);
            if($no_of_rows==0){
                echo "<h2 class='text-center text-danger'>No result match. No product found on this category!</h2>";
            }
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
        
    }
        
    //view details function
    function view_details(){
        global $con;
        //condition to check isset or not
        if(isset($_GET['product_id'])){
            if(!isset($_GET['category'])){
                if(!isset($_GET['brand'])){
                    $product_id = $_GET['product_id'];
                    $select_qry = "SELECT * FROM products order by rand() LIMIT 0,3";
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
                                                <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                }
            }
        }
    }
?>