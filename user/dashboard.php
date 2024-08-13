<?php
session_start();
require "database_connect.php";

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die();
}
$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM user WHERE id = $user_id";
//$sql_2 = "SELECT * FROM `application` WHERE usserid = $user_id";
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

function jobs($userid){
    $complete_data=[];
    $conn=mysqli_connect("localhost","root","","major");
    $sql = "SELECT * FROM `application` WHERE user_id='$userid'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
            $unit=[];
            $jname =$row['jobname'];
            $status=$row['status']; 
            array_push($unit,$jname,$status);
            array_push($complete_data,$unit);
        }
        return $complete_data;
    }  
    else {echo "No records has been found"; } 
    $conn->close();
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
</head>

<body>
<div class="container-xxl bg-white p-0">
        
        



        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">CareerHUB</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index_user.php" class="nav-item nav-link active">Home</a>

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">Job List</a>
                            <a href="category.php" class="dropdown-item">Job Category</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                        Hi, <?php echo $_SESSION["full_name"] ?>
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
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Dashboard
            </li>
        </ol>
    </nav>

    <div class="my-profile page-container">
        <h1>My Profile</h1>
        <div class="row">
            <div class="col-md-3 profile-img-container">
            <i class="fa fa-6x fa-user-tie text-primary mb-4"></i>
            </div>
            <div class="col-md-9">
                <div class="row no-gutters justify-content-between align-items-end">
                    <div class="profile">
                        <div class="name"><?= $user['full_name'] ?></div>
                        <div class="email"><?= $user['email'] ?></div>
                        <div class="phone"><?= $user['contact'] ?></div>
                        <div class="college"><?= $user['college_name'] ?></div>
                    </div>
                    
                </div>
            </div>
        </div>

        <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Job Title
                          </th>
                          <th>
                          </th>
                          <th>
                            Status of your Application
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody  id="parent">
                        <script>
                          let data=<?php print_r(json_encode(jobs($user['id'])));?>;
                          console.log(data);
                          var parent=document.getElementById("parent");
                          for (let i = 0; i < data.length; i++) {
                            var tr=document.createElement("tr")
                            tr.innerHTML=`<td>`+(i+1)+`</td>
                            <td>`+data[i][0]+`</td>
                            <td></td>
                            <td><button type="button" class="btn btn-warning">`+data[i][1]+`</button></td>`
                            parent.appendChild(tr);
                          }

                        </script>
                      </tbody>
                    </table>


    </div>
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
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
            </div>
            <div class="container">
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
