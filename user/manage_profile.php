<?php
session_start();
require "database_connect.php";

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to update profile
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $college_name = $_POST['college_name'];
    $user_id = $_SESSION['user_id'];

    // Update user information in the database
    $sql_update = "UPDATE user SET full_name='$full_name', email='$email', contact='$contact', college_name='$college_name' WHERE id=$user_id";
    $result_update = mysqli_query($conn, $sql_update);
    if ($result_update) {
        // Profile updated successfully
        header("location: dashboard.php");
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM user WHERE id = $user_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$user = mysqli_fetch_assoc($result_1);
if (!$user) {
    echo "Something went wrong!";
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | CareerHUB</title>
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/common.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/dashboard.css" rel="stylesheet" />
    <!-- Add your CSS and other head elements here -->
</head>

<body>
<div class="container-xxl bg-white p-0">
        
        



        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">CareerHUB</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.html" class="dropdown-item">Job List</a>
                            <a href="category.html" class="dropdown-item">Job Category</a>
                        </div>
                    </div> -->

                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#my-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="my-navbar">
            <ul class="navbar-nav">
                <?php
                //Check if user is loging or not
                if (!isset($_SESSION["user_id"])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="signup_modal.php" data-toggle="modal" data-target="#signup-modal">
                            <i class="fas fa-user"></i>Signup
                        </a>
                    </li>
                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="login_modal.php" data-toggle="modal" data-target="#login-modal">
                            <i class="fas fa-sign-in-alt"></i>Login
                        </a>
                    </li>
                <?php
                } else {
                ?>

                    <div class='nav-name'>
                        
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            Hi, <?php echo $_SESSION["full_name"] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="fas fa-user"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link" href="manage_profile.php"> <!-- Add Manage Profile link here -->
                    <i class="fas fa-cog"></i> Manage Profile
                </a>
            </li>
                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        </nav>
    <div>
    

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="index_user.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page" >
                Manage Profile
            </li>
        </ol>
    </nav>
    <br><br>
    <div class="container" style="background-color: #ADD8E6;" ><br>
        <h1 style="color: black">Manage Profile</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="full_name" class="form-label" style="color: black">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $user['full_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="color: black">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label" style="color: black">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?= $user['contact'] ?>">
            </div>
            <div class="mb-3">
                <label for="college_name" class="form-label" style="color: black">College Name</label>
                <input type="text" class="form-control" id="college_name" name="college_name" value="<?= $user['college_name'] ?>">
            </div>
            <button type="submit" class="btn btn-primary" style="color: white">Update Profile</button><br><br>
        </form>
    </div>
</body>

</html>
