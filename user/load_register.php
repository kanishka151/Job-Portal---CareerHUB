<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Regisration Form </title> 
</head>
<body>
    <div class="container">
        <header>Registration</header>

        <form action="load_register.php" method="post">

            <!--first page starts-->
            <div class="form first">

                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">

                        <input type="hidden" name="20" id="hi" value="">
                        <script>
                        const queryString = window.location.search;
                        const searchParams = new URLSearchParams(queryString);
                        const user_id = searchParams.get("userid");
                        var gets=document.getElementById("hi");
                        gets.value=user_id;
                        console.log(gets.value);
                        </script>
                        
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" id='1' placeholder="Enter your name" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" id="2" placeholder="Enter birth date" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" id="3" placeholder="Enter your email" required>
                        </div>
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" id ="4" placeholder="Enter mobile number" maxlength="10" required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select id="5" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="details ID">
                    <span class="title">Educational Background</span>

                    <!--  content-->
                    <div class="fields">
                        <div class="input-field">
                            <label>Name of the Institution</label>
                            <input type="text" id="6" placeholder="Enter college name" required>
                        </div>
                        <div class="input-field">
                            <label>Degree</label>
                            <input type="text" id="7" placeholder="Enter qualification" required>
                        </div>
                        <div class="input-field">
                            <label>Field of Study</label>
                            <input type="text" id="8" placeholder="Enter field of study" required>
                        </div>
                        <div class="input-field">
                            <label>Roll Number</label>
                            <input type="text" id="9" placeholder="Enter roll number" required>
                        </div>
                        <div class="input-field">
                            <label>Graduation Date</label>
                            <input type="date" id="10" placeholder="Enter your graduation date" required>
                        </div>
                    </div>

                    <!--  button-->
                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>
            <!--firts page ends-->
            <!--2nd page starts-->
            <div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Address Type</label>
                            <input type="text" id="11" placeholder="Permanent or Temporary" required>
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" id="12" placeholder="Enter nationality" required>
                        </div>
                        <div class="input-field">
                            <label>State</label>
                            <input type="text" id="13" placeholder="Enter your state" required>
                        </div>
                        <div class="input-field">
                            <label>District</label>
                            <input type="text" id="14" placeholder="Enter your district" required>
                        </div>
                    </div>

                </div>
                <div class="details job">
                    <span class="title">Skills and Achievements</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Languages</label>
                            <input type="text" id="15" placeholder="Enter languages you know" required>
                        </div>
                        <div class="input-field">
                            <label>Framework</label>
                            <input type="text" id="16" placeholder="Enter the frameworks you have worked on" required>
                        </div>
                        <div class="input-field">
                            <label>Project</label>
                            <input type="text" id="17" placeholder="Enter your best project" required>
                        </div>
                        <div class="input-field">
                            <label>Achievements</label>
                            <input type="text" id="18" placeholder="Enter your achievements" required>
                        </div>
                        <div class="input-field">
                            <label>Courses</label>
                            <input type="text" id="19" placeholder="Enter the courses you know" required>
                        </div>
                    </div>

                    <!--  buttons-->
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        <button class="sumbit" name="submit" onclick="apply()">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
            <!--2nd page ends-->
        </form>
        <script>
            function apply(){
            const queryString = window.location.search;
            const searchParams = new URLSearchParams(queryString);
            const id1 = searchParams.get("userid");

            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "register_suc.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var v1=document.getElementById("1").value;
            var v2=document.getElementById("2").value;
            var v3=document.getElementById("3").value;
            var v4=document.getElementById("4").value;
            var v5=document.getElementById("5").value;
            var v6=document.getElementById("6").value;
            var v7=document.getElementById("7").value;
            var v8=document.getElementById("8").value;
            var v9=document.getElementById("9").value;
            var v10=document.getElementById("10").value;
            var v11=document.getElementById("11").value;
            var v12=document.getElementById("12").value;
            var v13=document.getElementById("13").value;
            var v14=document.getElementById("14").value;
            var v15=document.getElementById("15").value;
            var v16=document.getElementById("16").value;
            var v17=document.getElementById("17").value;
            var v18=document.getElementById("18").value;
            var v19=document.getElementById("19").value;

            var params="userid="+id1+"&1="+v1+"&2="+v2+"&3="+v3+"&4="+v4+"&5="+v5+"&6="+v6+"&7="+v7+"&8="+v8+"&9="+v9+"&10="+v10+"&11="+v11+"&12="+v12+"&13="+v13+"&14="+v14+"&15="+v15+"&16="+v16+"&17="+v17+"&18="+v18+"&19="+v19;

            xhttp.send(params);
            xhttp.onload = function() {
                if (xhttp.status === 200) { 
                    alert("Registration Submitted Successfully");
                    location.replace("index_user.php");
                } else {
                    alert("Error: " + xhttp.statusText); 
                }
            }
        }
        </script>
    </div>
    <script src="js/script.js"></script>
</body>
</html>