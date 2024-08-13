<?php

function get_dat(){

    //set html form method to post or set button's formmethod="post"
    if(isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    
    $conn=mysqli_connect("localhost","root","","major");
    $sql = "SELECT * FROM register WHERE userid='$userid'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $fname =$row['fullname'];
        $email=$row['email'];
        $mob=$row['mobile'];
        $ins=$row['institute'];
        $deg=$row['degree'];
        $grad_dt=$row['graduation_date'];

        //Combined two fields
        $skills=$row['languages'].','.$row['frameworks'];
        
        $complete_data=array($fname,$email,$mob,$ins,$deg,$grad_dt,$skills);
        return $complete_data;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();
   }
}


function job_dec(){
    $csvFile = 'C:\Users\Kanishka\Downloads\appendable_jobs.csv';
    $name_array=[];
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $min=explode("\n\n",$data[4]);
          $res=explode("\n\n",$data[5]);
          $pre=explode("\n\n",$data[6]);
          $array=[$data[2],$data[3],$min,$res,$pre];
        array_push($name_array,$array);
      }
      fclose($handle);
    }
    return $name_array;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job portal with Autofill resume </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        


        <!-- upper nav-->
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

        
        </nav>


        <!-- Header-->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="job-list.html">Job List</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>


        <!-- Job Detail-->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/google_logo.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3" id="110"></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2" id="111"></i></span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>No details</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Minimum Qualifications</h4>
                            <ul class="list-unstyled" id="112">
                            </ul>

                            <h4 class="mb-3">Preferred Qualifications</h4>
                            <ul class="list-unstyled" id="113">
                            </ul>

                            <h4 class="mb-3">Responsibility</h4>
                            <ul class="list-unstyled" id="114">
                            </ul>
                        </div>
                        <script>
                            const queryString = window.location.search;
                            const searchParams = new URLSearchParams(queryString);
                            const job_id = Number( searchParams.get("job"));

                            let data=[];
                            data=<?php print_r(json_encode(job_dec()));?>;

                            var title=document.getElementById("110");
                            title.innerText=data[job_id+1][0];
                            var place=document.getElementById("111");
                            place.innerText=data[job_id+1][1];
                            var min=document.getElementById("112");
                            for (let i = 0; i < data[job_id+1][2].length; i++) {
                                var li=document.createElement("li");
                                li.innerHTML=`<i class="fa fa-angle-right text-primary me-2"></i>`+data[job_id+1][2][i];
                                min.appendChild(li);
                            }
                            var pre=document.getElementById("113");
                            for (let i = 0; i < data[job_id+1][3].length; i++) {
                                var li1=document.createElement("li");
                                li1.innerHTML=`<i class="fa fa-angle-right text-primary me-2"></i>`+data[job_id+1][3][i];
                                pre.appendChild(li1);
                            }
                            var res=document.getElementById("114");
                            for (let i = 0; i < data[job_id+1][4].length; i++) {
                                var li2=document.createElement("li");
                                li2.innerHTML=`<i class="fa fa-angle-right text-primary me-2"></i>`+data[job_id+1][4][i];
                                res.appendChild(li2);
                            }
                            
                        </script>
        

                        <!--Application-->
                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>


                            <form action="job_detail.php" method="post">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Full Name" id="1">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" placeholder="Your Email" id="2">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Contact No." id="3">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Institute" id="4">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Degree" id="5">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Graduation Date" id="6">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Skills" id="7">
                                    </div>
                                    
                                    <div class="col-12">
                                        <input type="checkbox" id="8" name="auto" onchange="autofiller()">
                                        <label for="8">Interested and autofill.</label>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="button" name="submit" onclick="apply()">Apply</button>
                                    </div>
                                </div>
                            </form>

                            <script>
                                function autofiller(){
                                if (document.getElementById("8").checked) {
                                    let data=[];
                                    data=<?php print_r(json_encode(get_dat()));?>;
                                    document.getElementById("1").value =data[0];
                                    document.getElementById("2").value =data[1];
                                    document.getElementById("3").value =data[2];
                                    document.getElementById("4").value =data[3];
                                    document.getElementById("5").value =data[4];
                                    document.getElementById("6").value =data[5];
                                    document.getElementById("7").value =data[6];
                                    } 
                                else {
                                    document.getElementById("1").value =""
                                    document.getElementById("2").value =""
                                    document.getElementById("3").value =""
                                    document.getElementById("4").value =""
                                    document.getElementById("5").value =""
                                    document.getElementById("6").value =""
                                    document.getElementById("7").value =""
                                }
                                }
                                function apply(){
                                    const queryString = window.location.search;
                                    const searchParams = new URLSearchParams(queryString);
                                    const id1 = searchParams.get("userid");
                                    const id2 = searchParams.get("job");
                                    const id3 = searchParams.get("jobname");
                                    console.log(id3);
                                    const xhttp = new XMLHttpRequest();
                                    xhttp.open("POST", "apply_suc.php");
                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    var params="job="+id2+"&userid="+id1+"&jobname="+id3;
                                    xhttp.send(params);
                                    xhttp.onload = function() {
                                        // location.replace("reg_success.html");
                                        alert("Application Submitted Successfully");
                                        location.replace("index_user.php");
                                    }
                                }
            </script>



                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summary</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published : 1 week ago</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: Full Time</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: Ahmedabad, Gujarat, India</p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Company : Job Museum</p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">We're Job Museum, your absolute solution to find a job that's suitable for you according to your needs and requirements. We are not charging anything from the candidate to help them find a job. We act as a bridge between company and candidate and match them according to each other's requirements.</p><br>
                            <p><i class="fa fa-angle-right text-primary me-2">Website : https://jobmuseum.com/</i></p>
                            <p><i class="fa fa-angle-right text-primary me-2">Phone : 7600028847</i></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Industry : Human Resources Services</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Company size : 11-50 employees, 32 associated members</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Headquaters : Surat, Gujarat</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Founded : 2019</p>
                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    


        <!-- Footer-->
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
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>





