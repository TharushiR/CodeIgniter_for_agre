<!DOCTYPE html>
<html>
<body>

<?php 
//echo "welcome";
$db_hostname = 'localhost';
$db_database = 'agri01'; 
$db_username = 'root';
$db_password = '';

// Connect to server.

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
	
?>

<?php //add.php

require_once 'comment.html'; 

// Get values from form


$name    = $_POST['name'];	
$email   = $_POST['email'];
$comment  = $_POST['comment'];   

if ( !is_numeric($name)){
$sql="INSERT INTO fdbck (Name, Email, Comment, Date)
VALUES ('$name','$email', '$comment', NOW())";
//echo $sql;
}
$result = mysqli_query($sql); 


// if successfully insert data into database, displays message "Successful".
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close mysql
mysqli_close();
?> 
</body>
</html>