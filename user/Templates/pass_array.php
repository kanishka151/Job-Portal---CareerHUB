<?php
function get_data(){

    $conn=mysqli_connect("localhost","root","","major");

    $sql= "SELECT * FROM demo WHERE id='1'";
    $names=$conn->query($sql);
    if ($names->num_rows > 0) { 
        while($row = $names->fetch_assoc()) { 
        $fname =$row['firstname'];
        $lname=$row['lastname'];
        $email=$row['email'];
        $complete_data=array($fname,$lname,$email);
        return $complete_data;
    }
    }  
    else {echo "No records has been found"; } 
    $conn->close();

}
?>


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
                <input type="checkbox" id="5" name="auto" onchange="autofiller()">
                <label for="5">Interested and autofill.</label>
                <br>
                <br>
                <input type="submit" value="LOGIN" name ='button'>
            </form>

            <script>
                function autofiller(){
                if (document.getElementById("5").checked) {
                let data=[];
                data=<?php print_r(json_encode(get_data()));?>;
                console.log(typeof(data));
                document.getElementById("1").value =data[0];
                document.getElementById("2").value =data[1];
                document.getElementById("3").value ="Kanishka";
                document.getElementById("4").value ="Kanishka";
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






