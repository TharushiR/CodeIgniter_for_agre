<?php
require_once 'core/init.php';

$user = new User();

$p_id = $_GET['id'];

$cost = $user->search('products', 'product_id', $p_id, 'cost');

$p = $user->search('products', 'product_id', $p_id, 'p_name');

$u = $user->data()->username;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agri";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO cart(product_id, p_name, cost, username) VALUES ('$p_id', '$p', '$cost', '$u')";

if ($conn->query($sql) === TRUE) {
    Redirect::to('index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>