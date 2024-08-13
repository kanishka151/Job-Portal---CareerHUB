<?php

    //set html form method to post or set button's formmethod="post"
    $fname=str_replace(array("\'","\""),'',$_POST['firstname']);
    $lname=str_replace(array("\'","\""),'',$_POST['lastname']);
    $pass=str_replace(array("\'","\""),'',$_POST['pasword']);
    $email=str_replace(array("\'","\""),'',$_POST['email']);

    $conn=mysqli_connect("localhost","root","","major");

    $sql="INSERT INTO sd_details (id,firstname,lastname,email,pasword) VALUES ('4','$fname','$lname','$email','$pass')";

    if($conn->query($sql)===TRUE){
        echo "Record added ";
    }
    else{
        echo "connection failed ". $conn->error;;
    }


    if(isset($_POST["submit"])){
        //set html form method to post or set button's formmethod="post"
        $fname=str_replace(array("\'","\""),'',$_POST['1']);
        $dob=str_replace(array("\'","\""),'',$_POST['2']);
        $email=str_replace(array("\'","\""),'',$_POST['3']);
        $mob=str_replace(array("\'","\""),'',$_POST['4']);
        $gender=str_replace(array("\'","\""),'',$_POST['5']);
        $institute=str_replace(array("\'","\""),'',$_POST['6']);
        $degree=str_replace(array("\'","\""),'',$_POST['7']);
        $study_field=str_replace(array("\'","\""),'',$_POST['8']);
        $roll_no=str_replace(array("\'","\""),'',$_POST['9']);
        $grad_date=str_replace(array("\'","\""),'',$_POST['10']);
        $add_type=str_replace(array("\'","\""),'',$_POST['11']);
        $ntion=str_replace(array("\'","\""),'',$_POST['12']);
        $state=str_replace(array("\'","\""),'',$_POST['13']);
        $district=str_replace(array("\'","\""),'',$_POST['14']);
        $langs=str_replace(array("\'","\""),'',$_POST['15']);
        $frmwrk=str_replace(array("\'","\""),'',$_POST['16']);
        $project=str_replace(array("\'","\""),'',$_POST['17']);
        $achieve=str_replace(array("\'","\""),'',$_POST['18']);
        $cources=str_replace(array("\'","\""),'',$_POST['19']);}