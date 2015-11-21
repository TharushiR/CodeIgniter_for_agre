<?php
require_once 'core/init.php';
    // Create connection
    $con=mysqli_connect("localhost","root","","agri");
    // Check connection
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    
    $sql = "TRUNCATE TABLE cart";
    mysqli_query($con, $sql) or die(mysqli_error());
    Redirect::to('index.php');
?>