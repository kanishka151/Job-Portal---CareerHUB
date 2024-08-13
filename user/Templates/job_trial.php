<?php
function get_data(){

    $conn=mysqli_connect("localhost","root","","major");

    $sql= "SELECT * FROM user_details WHERE registration_id='1'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $fname =$row['fullname'];
        $email=$row['email'];
        $mob=$row['mobile'];
        $ins=$row['institute'];
        $deg=$row['degree'];
        $complete_data=array($fname,$email,$mob,$ins,$deg);
        return $complete_data;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();

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
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        


        <!-- upper nav-->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">CareerHUB</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.html" class="dropdown-item">Job List</a>
                            <a href="category.html" class="dropdown-item">Job Category</a>
                        </div>
                    </div>

                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                
                <a href="signup.html" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">SIGN UP<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
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
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/jobmuseum_logo.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">Product Marketing Manager</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Ahmedabad, Gujarat, India</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>No details</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>We are looking for a Product Marketing Manager to lead our outbound marketing activities. You’ll be responsible for presenting our products in ways that will strengthen our brand and boost sales.</p>

                            <h4 class="mb-3">Responsibility</h4>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Study company product &translate technical details into benefits for the user</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Develop product marketing strategies & craft compelling messages across marketing channels (landing pages, ad campaigns)</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Work with various teams (design, content, acquisition, product, sales) to implement strategies</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Strategize and execute email campaigns, advertising, webinars, trade shows, social media, and more</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Take ownership of pipeline creation and meeting monthly and quarterly MQL, meeting, and pipeline targets</li>
                            </ul>

                            <h4 class="mb-3">Responsibility</h4>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Proven experience as a Product Marketer</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Experience in market analysis</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Familiar with product marketing tactics (e.g. integrated marketing campaigns)</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Working knowledge of web analytics tools (Google Analytics, WebTrends)</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Excellent communication skills</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Keen eye for detail</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Analytical mind and strong quantitative skills</li>
                            </ul>
                        </div>
        

                        <!--Application-->
                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>


                            <form>
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
                                    <div class="col-12">
                                        <input type="checkbox" id="6" name="auto" onchange="autofiller()">
                                        <label for="6">Interested and autofill.</label>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply</button>
                                    </div>
                                </div>
                            </form>

                            <script>
                                function autofiller(){
                                if (document.getElementById("6").checked) {
                                    let data=[];
                                    data=<?php print_r(json_encode(get_data()));?>;
                                    console.log(typeof(data));
                                    document.getElementById("1").value =data[0];
                                    document.getElementById("2").value =data[1];
                                    document.getElementById("3").value =data[2];
                                    document.getElementById("4").value =data[3];
                                    document.getElementById("5").value =data[4];
                                    } 
                                else {
                                    document.getElementById("1").value =""
                                    document.getElementById("2").value =""
                                    document.getElementById("3").value =""
                                    document.getElementById("4").value =""
                                    document.getElementById("5").value =""
                                    
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