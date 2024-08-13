<?php
require("../database_connect.php");

$full_name = $_POST['full_name'];
$phone = $_POST['contact'];
$email = $_POST['email'];
$password = $_POST['password'];

$college_name = $_POST['college_name'];
$gender = $_POST['gender'];

$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

$row_count = mysqli_num_rows($result);
if ($row_count != 0) {
	echo "This email id is already registered with us!";
	exit;
}

$sql = "INSERT INTO user (full_name,contact,email,password,college_name,gender) VALUES ( '$full_name','$phone', '$email', '$password' , '$college_name','$gender')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

echo "Your account has been created successfully!";
?>

Click <a href="../login_modal.php">here</a> to continue.
<?php
mysqli_close($conn);
