<?php
session_start();
require("../database_connect.php");

// Check if email and password are provided
if(empty($_POST['email']) || empty($_POST['password'])) {
    echo "Email and password are required.";
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    // Query execution error
    echo "Something went wrong with the query: " . mysqli_error($conn);
    exit;
}

$row_count = mysqli_num_rows($result);

if ($row_count == 0) {
    // No matching user found
    echo "Login failed! Invalid email or password.";
    exit;
}

// Authentication successful, set session variables
$row = mysqli_fetch_assoc($result);
$_SESSION['user_id'] = $row['id'];
$_SESSION['full_name'] = $row['full_name'];
$_SESSION['email'] = $row['email'];

// Redirect to index.php after successful login
header("location: ../index_user.php");
exit;

mysqli_close($conn);
?>
