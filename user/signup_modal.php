<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>SignUp with CareerHUB</title>
    <link rel="stylesheet" href="admin_signup.css">
    
</head>
<body>
    <header>
		<h1 class="heading">SignUp with CareerHUB</h1>
		
	</header>
    
    <div class="registration-container">
        
        
    <form id="registration-form" action="api/signup_submit.php" method="post">
            <div class="input-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="full_name" required>
            </div>
            <div class="input-group">
                <label for="cname">Contact Number:</label>
                <input type="text" id="cname" name="contact" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" placeholder="youremail@mail.com" id = "email" name="email" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span id="password-info" style="color: red;"></span>
            </div>
            <div class="input-group">
                <label for="cname">College Name:</label>
                <input type="text" id="cname" name="college_name" required>
            </div>
            <div class="input-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            
            
            <!-- <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            
            <input type="password" name="confirm" placeholder="ConfirmPassword" required><br>
            <input type="text" name="contact" placeholder="contact" required><br> -->

            
            
             <div class="input-group"> 
                <button type="submit"  method = "post"> Register</button>
            </div> 
        </form>
    </div>
    <!-- <script src="hospitalRegistration.js"></script> -->
</body>
</html>
