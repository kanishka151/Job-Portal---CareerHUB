<?php 
function applc(){
  $job_id= $_GET['job'];
  $conn = mysqli_connect("127.0.0.1", "root", "", "major");

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL! Please contact the admin.";
      return;
  }
  else{
    $sql= "SELECT * FROM `application` WHERE job_id='$job_id'";
    $result = mysqli_query($conn, $sql);
    
    $app=[];
    $i=0;
    if ($result && mysqli_num_rows($result)>0) {
      while($i<mysqli_num_rows($result)){
        $unit=[];
        $row = mysqli_fetch_assoc($result);
        array_push($unit,$row['user_id'],$row['status']);
        
        $id=$row['user_id'];
        $conn1 = mysqli_connect("127.0.0.1", "root", "", "major");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL! Please contact the admin.";
            return;
        }
        else{
          $sql1= "SELECT fullname FROM register WHERE userid=".$id;
          $result1 = mysqli_query($conn1, $sql1);
          $row1 = mysqli_fetch_assoc($result1);
          array_push($unit,$row1['fullname']);
        }
        array_push($app,$unit);
        $i=$i+1;
      }
      return $app;
      
    } else {
        echo "NO DATA TO SHOW!!!!";
    }
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

<!--TABLE STARTS*******************************************************************-->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><br>Below are the people who applied......</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Applicant Name
                          </th>
                          <th>
                          </th>
                          <th>
                            Full Profile
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody  id="parent">
                        <script>
                          let data=<?php print_r(json_encode(applc()));?>;
                          console.log(data);
                          const queryString = window.location.search;
                          const searchParams = new URLSearchParams(queryString);
                          const id1 = searchParams.get("job");

                          var parent=document.getElementById("parent");
                          for (let i = 0; i < data.length; i++) {
                            var tr=document.createElement("tr")
                            if(data[i][1]=='not-selected'){
                              tr.innerHTML=`<td>`+(i+1)+`</td>
                              <td> `+data[i][2]+`</td>
                              <td></td>
                              <td><a href="applicant.php?user=`+data[i][0]+`&job=`+id1+`">
                                    <button type="button" class="btn btn-warning">View</button>
                                  </a>
                              </td>`
                              parent.appendChild(tr);
                            }
                            else{
                              tr.innerHTML=`<td>`+(i+1)+`</td>
                              <td> `+data[i][2]+`</td>
                              <td></td>
                              <td><a href="applicant.php?user=`+data[i][0]+`&job=`+id1+`">
                                    <button type="button" class="btn btn-warning" disabled>Selected</button>
                                  </a>
                              </td>`
                              parent.appendChild(tr);
                            }
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
