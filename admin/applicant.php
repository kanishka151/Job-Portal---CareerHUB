<?php 
function fill_user(){
  $user= $_GET['user'];
  $conn = mysqli_connect("127.0.0.1", "root", "", "major");

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL! Please contact the admin.";
      return;
  }
  else{
    $sql= "SELECT * FROM `register` WHERE userid='$user'";
    $result = mysqli_query($conn, $sql);
    
    $app=[];
    if ($result && mysqli_num_rows($result)===1) {
      $row = mysqli_fetch_assoc($result);
      array_push($app,$row['userid'],$row['fullname'],$row['email'],$row['mobile'],$row['institute'],$row['degree'],$row['study_field'],$row['address_type'],$row['nationality'],$row['_state'],$row['district'],$row['languages'],$row['frameworks'],$row['project'],$row['achievements'],$row['courses']);
      return json_encode($app);
    } 
    else {
        echo "NO DATA TO SHOW!!!!";
    }
  }
}

function selectapp(){
  $user= $_GET['user'];
  $job=$_GET['job'];
  $conn = mysqli_connect("127.0.0.1", "root", "", "major");

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL! Please contact the admin.";
      return;
  }
  else{
    $sql= "UPDATE `application` SET `status`='selected' WHERE user_id='$user' AND job_id='$job'";
    if(mysqli_query($conn, $sql)===TRUE){
      return "YOU ARE SELECTED";
    } 
    else {
        return "STATUS PENDING";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View user profile</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <link href="css2/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link href="css2/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
    <link href="css2/aos.css?ver=1.2.0" rel="stylesheet">
    <link href="css2/main.css?ver=1.2.0" rel="stylesheet">
    <noscript>
      <style type="text/css">
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
  </head>
  <body id="top">
    <div class="page-content">
      <div class="container">
<div class="cover shadow-lg bg-white">
  <div class="cover-bg p-3 p-lg-4 text-white">
    <div class="row">
      <div class="col-lg-4 col-md-5">
      </div>
      <div class="col-lg-8 col-md-7 text-center text-md-start">
        <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0" id="0"></h2>
        <p data-aos="fade-left" data-aos-delay="100" id="11"></p>
        <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
          <a class="btn btn-light text-dark shadow-sm mt-1 me-1" href="#" target="_blank">See Resume</a>
          <button class="btn btn-success shadow-sm mt-1" onclick="select()" id="12">Select Candidate</button>
        </div>
      </div>
    </div>
  </div>


  <div class="about-section pt-4 px-3 px-lg-4 mt-1">
    <div class="row">
      <div class="col-md-5 offset-md-1">
        <div class="row mt-2">
          <div class="col-sm-4">
            <div class="pb-1">Email</div>
          </div>
          <div class="col-sm-8">
            <div class="pb-1 text-secondary" id="1"></div>
          </div>
          <div class="col-sm-4">
            <div class="pb-1">Phone</div>
          </div>
          <div class="col-sm-8">
            <div class="pb-1 text-secondary" id="2"></div>
          </div>
          <div class="col-sm-4">
            <div class="pb-1">Address</div>
          </div>
          <div class="col-sm-8">
            <div class="pb-1 text-secondary" id="3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <hr class="d-print-none"/>
  <div class="work-experience-section px-3 px-lg-4">
    <h2 class="h3 mb-4">Professional Skills</h2>
    <div class="timeline">
      <div class="timeline-card timeline-card-primary card shadow-sm">
        <div class="card-body">
          <div class="h5 mb-1">Languages<span class="text-muted h6"></span></div>
          <div id="4"></div>
        </div>
      </div>
        <div class="timeline-card timeline-card-primary card shadow-sm">
          <div class="card-body">
            <div class="h5 mb-1">Frameworks <span class="text-muted h6"></span></div>
                <div id="5"></div>
              </div>
            </div>
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <div class="h5 mb-1">Courses<span class="text-muted h6"></span></div>
                <div id="6"></div>
              </div>
            </div>
          </div>
        </div>

<hr class="d-print-none"/>
  <div class="work-experience-section px-3 px-lg-4">
    <h2 class="h3 mb-4">Work Experience</h2>
    <div class="timeline">
      <div class="timeline-card timeline-card-primary card shadow-sm">
        <div class="card-body">
          <div class="h5 mb-1">Projects<span class="text-muted h6"></span></div>
            <div class="text-muted text-small mb-2">May, 2021 - Present</div>
            <div id="7"></div>
          </div>
        </div>
        <div class="timeline-card timeline-card-primary card shadow-sm">
          <div class="card-body">
            <div class="h5 mb-1">Achievements<span class="text-muted h6"></span></div>
            <div id="8"></div>
          </div>
        </div>
      </div>
    </div>
<hr class="d-print-none"/>
  <div class="page-break"></div>
    <div class="education-section px-3 px-lg-4 pb-4">
      <h2 class="h3 mb-4">Education</h2>
        <div class="timeline">
          <div class="timeline-card timeline-card-success card shadow-sm">
            <div class="card-body">
              <div class="h5 mb-1">Undergraduate  <span class="text-muted h6" id='9'></span></div>
              <div class="text-muted text-small mb-2" id='10'></div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
      <script>
        let data=[];
        data=<?php print_r(fill_user());?>;
        console.log(data);
        var name_=document.getElementById("0");
        name_.innerText=data[1];
        var email=document.getElementById("1");
        email.innerText=data[2];
        var phone=document.getElementById("2");
        phone.innerText=data[3];
        var address=document.getElementById("3");
        address.innerText="("+data[7]+") "+data[4]+", "+data[10]+", "+data[9];

        var lang=document.getElementById("4");
        lang.innerText=data[11];
        var frwk=document.getElementById("5");
        frwk.innerText=data[12];
        var crs=document.getElementById("6");
        crs.innerText=data[15];

        var pr=document.getElementById("7");
        pr.innerText=data[13];
        var ach=document.getElementById("8");
        ach.innerText=data[14];

        var ins=document.getElementById("9");
        ins.innerText="from "+data[4];
        var crsde=document.getElementById("10");
        crsde.innerText=data[5]+"--"+data[6];

        var nat=document.getElementById("11");
        nat.innerText="__________"+data[8]+"__________";

        function select(){
          console.log("<?php echo selectapp();?>");
          var button=document.getElementById("12");
          button.innerText="Selected";
          button.disabled=true;
          alert("Status updated...");
        }
        
      </script>



    
    <script src="scripts2/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="scripts2/aos.js?ver=1.2.0"></script>
    <script src="scripts2/main.js?ver=1.2.0"></script>
  </body>
</html>