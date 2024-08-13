<?php

if(isset($_POST['userid'])){
    //set html form method to post or set button's formmethod="post"
    $fname=str_replace(array("\'","\""),'',$_POST['1']);
    $dob=str_replace(array("\'","\""),'',$_POST["2"]);
    $email=str_replace(array("\'","\""),'',$_POST["3"]);
    $mob=str_replace(array("\'","\""),'',$_POST["4"]);
    $gender=str_replace(array("\'","\""),'',$_POST["5"]);
    $institute=str_replace(array("\'","\""),'',$_POST["6"]);
    $degree=str_replace(array("\'","\""),'',$_POST["7"]);
    $study_field=str_replace(array("\'","\""),'',$_POST["8"]);
    $roll_no=str_replace(array("\'","\""),'',$_POST["9"]);
    $grad_date=str_replace(array("\'","\""),'',$_POST["10"]);
    $add_type=str_replace(array("\'","\""),'',$_POST["11"]);
    $ntion=str_replace(array("\'","\""),'',$_POST["12"]);
    $state=str_replace(array("\'","\""),'',$_POST["13"]);
    $district=str_replace(array("\'","\""),'',$_POST["14"]);
    $langs=str_replace(array("\'","\""),'',$_POST["15"]);
    $frmwrk=str_replace(array("\'","\""),'',$_POST["16"]);
    $project=str_replace(array("\'","\""),'',$_POST["17"]);
    $achieve=str_replace(array("\'","\""),'',$_POST["18"]);
    $cources=str_replace(array("\'","\""),'',$_POST["19"]);
    $userid=$_POST['userid'];
    /*$complete_data=array($fname,$dob,$email,$mob,$gender,$institute,$degree,$study_field,$roll_no,$grad_date,$add_type,$ntion,$state, $district,$langs,
    $frmwrk,$project,$achieve,$cources);*/

    $conn=mysqli_connect("localhost","root","","major");

    $sql="INSERT INTO register (userid,fullname,dob,email,mobile,gender,institute,degree,study_field,roll_no,graduation_date,address_type,nationality,_state,district,languages,frameworks,project,achievements,courses) VALUES ('$userid','$fname','$dob','$email','$mob','$gender','$institute','$degree','$study_field','$roll_no','$grad_date','$add_type','$ntion','$state', '$district','$langs',
    '$frmwrk','$project','$achieve','$cources')";


    if($conn->query($sql)===TRUE){
        echo http_response_code(200); 
    }
    else{
        http_response_code(500); 
        echo "Connection failed: " . $conn->error;
    }
}
