


<!DOCTYPE html>
<html>
    <body>
        <div>
            <legend><b>Form : Software Development Intern</b><br><br></legend>
            <form>
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
                <input type="checkbox" id="5"  onchange="autofiller()">
                <label for="5">Interested and autofill.</label>
                <br>
                <br>
                <input type="submit" value="LOGIN" name ='button'>
            </form>
            <script>
                function autofiller(){
                if (document.getElementById("5").checked) {

                var fname="<?php echo fname_from_db();?>"
                document.getElementById("1").value =fname

                var lname="<?php echo lname_from_db();?>"
                document.getElementById("2").value =lname
                
                var email="<?php echo email_from_db();?>"
                document.getElementById("3").value =email

                var pass="<?php echo pass_from_db();?>"
                document.getElementById("4").value =pass
                } 
                else {
                document.getElementById("1").value =""
                document.getElementById("2").value =""
                document.getElementById("3").value =""
                document.getElementById("4").value =""
                }
                }
            </script>
           
        </div>
    </body>
</html>


<?php


function fname_from_db(){

    $conn=mysqli_connect("localhost","root","","major");

    $sql= "SELECT * FROM users WHERE id='1'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $fname =$row['firstname'];
        return $fname;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();

}

function lname_from_db(){

    $conn=mysqli_connect("localhost","root","","major");

    $sql= "SELECT * FROM users WHERE id='1'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $lname =$row['lastname'];
        return $lname;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();

}

function email_from_db(){

    $conn=mysqli_connect("localhost","root","","major");

    $sql= "SELECT * FROM users WHERE id='1'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $email =$row['email'];
        return $email;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();

}

function pass_from_db(){

    $conn=mysqli_connect("localhost","root","","major");

    $sql= "SELECT * FROM users WHERE id='1'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $pass =$row['password'];
        return $pass;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();

}
?>