<?php
    $con = mysqli_connect('localhost' , 'root' , '' , 'mystore');

    if($con){
        echo "connection succdessfull.";
    }
    else{
        die(mysqli_error($con));
    }
?>