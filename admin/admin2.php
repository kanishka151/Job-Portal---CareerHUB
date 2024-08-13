<?php
// Include your database connection file
include('database_connect.php');
$username_err = $email_err = $password_err = $contact_err ="";
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $username = $email = $password = $contact= "";
    
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);
    }
    
    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";     
    } else {
        $password = trim($_POST["password"]);
    }
    if (empty(trim($_POST["contact"]))) {
        $contact_err = "Please enter contact number.";     
    } else {
        $contact = trim($_POST["contact"]);
    }
    
    // Check input errors before inserting into database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($contact_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO admin (name, email, password, contact) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_password, $param_contact);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $param_contact = $contact;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo "New Admin name is successfully added.";
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Admin</title>
    <!-- Add your CSS and other head elements here -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css3/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css3/common.css" rel="stylesheet" />
    <link href="css3/main.css" rel="stylesheet" />
    <link href="css3/dashboard.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 100px auto;
            background-color: #124076;
            color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #f4f4f4;
        }
        .container label {
            display: block;
            margin-bottom: 8px;
        }
        .container input[type="text"],
        .container input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<div class="container-xxl bg-white p-0" >
        
        



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

                    

                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                
                
                <a href="index.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">LOGOUT<i class="fa fa-arrow-right ms-3"></i></a>
                
           
        </div>
        </nav>
    
    

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Add Admin
            </li>
        </ol>
    </nav>
    <div class="container">
    <h2>Add Admin</h2>
    <p>Please fill in the information below:</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Username</label>
            <input type="text" name="username" value=" ">

            
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" value="">
            
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="">
            
        </div>
        <div>
            <label>Contact</label>
            <input type="text" name="contact" value="">
            
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
    </div>

    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact Us</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>NIT Uttarakhand, Srinagar, Uttarakhand</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0000000000</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>tyyu@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            
            
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="index.html">CareerHUB</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            
        </div>

    </div>
</body>

</html>
