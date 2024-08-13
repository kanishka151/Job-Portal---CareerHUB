<?php
if(isset($_POST['userid'], $_POST['job'],$_POST['jobname'])) {
$userid = $_POST['userid'];
$jobid = $_POST['job'];
$jobnm = $_POST['jobname'];
$conn=mysqli_connect("localhost","root","","major");
$sql="INSERT INTO `application` (user_id,job_id,jobname) VALUES ('$userid','$jobid','$jobnm')";
if($conn->query($sql)===TRUE){
    echo '<script>
    alert("Application successfull.")
    </script>';
}
else{
    echo "connection failed ". $conn->error;
}

}
else {
    // POST data not set
    echo "Error: POST data not received";
}
