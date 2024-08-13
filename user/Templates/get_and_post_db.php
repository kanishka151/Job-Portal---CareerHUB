
<!DOCTYPE html>
<html>
    <body>
        <div>
            <legend><b>Form : Software Development Intern</b><br><br></legend>
            <form action="form1.php">
                <label for="firstname">First name: </label>
                <input type="text" name="firstname" id="1">
                <br>
                <label for="lastname">Last name: </label>
                <input type="text" name="lastname" id="2">
                <br>
                <label for="email">email: </label>
                <input type="email" name="email" id="3">
                <br>
                <label for="pasword">password: </label>
                <input type="password" name="pasword" id="4">
                <br>
                <br>
                <input type="submit" formmethod="GET" value="AUTOFILL" name='autofill' onclick="autofiller()">
                <br>
                <br>
                <input type="submit" formmethod="POST" value="LOGIN" name ='button'>
            </form>
           
        </div>
    </body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='GET'){

    $conn=mysqli_connect("localhost","root","","major");


    $sql= "SELECT firstname FROM users WHERE id='1'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $fname =$row['firstname'];
        //$myJSON = json_encode($result); echo $myJSON;
        $auto=json_encode($fname);
        echo $fname;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();

}

else{

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
        echo "FAiled looser". $conn->error;;
    }
}

?>