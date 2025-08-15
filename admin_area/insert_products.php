<?php
    include("../includes/connect.php");

    if(isset($_POST['insert_product'])){
        $title = $_POST['product_title'];
        $desc = $_POST['product_description'];
        $keywords = $_POST['product_keyword'];
        $category = $_POST['product_category'];
        $brand = $_POST['product_brand'];
        $price = $_POST['product_price'];
        $status = "true";

        //accessing images
        $image1 = $_FILES['product_image1']['name'];
        $image2 = $_FILES['product_image2']['name'];
        $image3 = $_FILES['product_image3']['name'];

        //accessing image temp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        //checkin empty condition
        if($title=='' or $desc=='' or $keywords=='' or $category=='' or $brand=='' or $price=='' or $image1=='' or $image2=='' or $image3==''){
            echo "<script>alert('Please fill all the fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1 , "./product_images/$image1");
            move_uploaded_file($temp_image2 , "./product_images/$image2");
            move_uploaded_file($temp_image3 , "./product_images/$image3");

            //insert query
            $insert_qry = "INSERT INTO products (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
            VALUES ('$title','$desc','$keywords','$category','$brand','$image1','$image2','$image3','$price',NOW(),'$status')";

            $result = mysqli_query($con , $insert_qry);

            if($result){
                echo "<script>alert('Product inserted successfully')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
    <!-- css file -->
     <link rel="stylesheet" href="../style.css">
    
     <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required>
            </div>

            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off" required>
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" class="form-select" id="">
                    <option value="">Select a category</option>

                    <?php
                        $select_qry = "SELECT * FROM categories";
                        $result = mysqli_query($con , $select_qry);
                        while($row = mysqli_fetch_assoc($result)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" class="form-select" id="">
                    <option value="">Select a brand</option>
                    <?php
                        $select_qry = "SELECT * FROM brands";
                        $result = mysqli_query($con , $select_qry);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?> 
                </select>
            </div>

            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required>
            </div>

            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required>
            </div>

            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
            </div>

            <!-- submit btn -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product"  class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
</body>
</html>