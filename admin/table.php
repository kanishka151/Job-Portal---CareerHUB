<?php 
function jobs(){
  $csvFile = 'C:\Users\Kanishka\Downloads\full_des.csv';
  $name_array=[];
  if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      array_push($name_array,$data[2]);
    }
    fclose($handle);
  }
  return $name_array;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">



    <!--NAVBAR STARTS********************************************************-->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/dashboard/google_logo.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/dashboard/check2.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-settings d-none d-lg-flex">
              <a class="dropdown-item">
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

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><br>Jobs Offered By Us...</h4>
                  <div class="table-responsive pt-3">
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
                            List of Applicants
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody  id="parent">
                        <script>
                          let data=<?php print_r(json_encode(jobs()));?>;
                          console.log(data);
                          var parent=document.getElementById("parent");
                          for (let i = 0; i < 20; i++) {
                            var tr=document.createElement("tr")
                            tr.innerHTML=`<td>`+(i+1)+`</td>
                            <td>`+data[i+2]+`</td>
                            <td></td>
                            <td><a href="user.php?job=`+(i+1)+`"><button type="button" class="btn btn-warning">Check</button></a></td>`
                            parent.appendChild(tr);
                          }

                        </script>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!--TABLES END HERE********************************************************************-->
      </div>
    </div>
  </div>

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
</body>

</html>
