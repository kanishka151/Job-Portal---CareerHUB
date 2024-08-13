<?php 
function noapp(){
  $conn = mysqli_connect("127.0.0.1", "root", "", "major");

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL! Please contact the admin.";
      return;
  }
  else{
    $sql= "SELECT * FROM `application`";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">

    <!--NAVBAR STARTS********************************************************-->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo " href="index.html"><img src="images/dashboard/google_logo.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/dashboard/check2.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-settings d-none d-lg-flex">
              <a class="dropdown-item" href="login.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
  <!--NAVBAR ENDS HERE********************************************************-->

  <!--DASHBOARD PANEL*************************************************************-->

    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="table.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Job Offers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin2.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Add New Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Edit Jobs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Check Selected <br>Candidates</span>
            </a>
          </li>
        </ul>
      </nav>
    <!--DASHBOARD PANEL*************************************************************-->


    <!--MAIN STARTS********************************************************************-->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold" id="chhure">Welcome </h3>
                  <h6 class="font-weight-normal mb-0">Let's Get to Work, don't forget to check for any new Job Application!!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/bg_sit.jpg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Srinagar</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Jost Posting</p>
                      <p class="fs-30 mb-2">20</p>
                      <p class="mb-4">Job Offers posted till now</p>
                      <a href="table.php"><button type="button" class="btn btn-warning">View</button></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total number of Applicants</p>
                      <p class="fs-30 mb-2" id='1'></p>
                      <p>Across all job posts</p>
                    </div>
                  </div>
                </div>
                <script>
                      var totalapp=document.getElementById("1");
                      var num=<?php echo noapp();?>;
                      totalapp.innerText=num+" people";
                    </script>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Talent Search</p>
                      <p class="fs-30 mb-2">COMING SOON</p>
                      <p>for employees only</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Contact</p>
                      <p>+91-000-90809</p>
                      <p>www.google_helpdesk@ac.in</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  <!--MAIN ENDS*******************************************************************-->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. NIT UTTARAKHAND</span>
          </div>
        </footer>

      </div>
    </div>
  </div>

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
</body>

</html>

