<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="admin_signup.css">
    
   
</head>
<body>
    <header><br><br>
		<h1 class="heading">Welcome to CareerHUB</h1>
		
	</header>
    <div class="Login-container">

        <h2>Login</h2>
        <form id="login-form" action="api/login_submit.php" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" placeholder="youremail@mail.com" id = "email" name="email" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
               
            </div>
            
           <br>
            <div class="input-group">
                <button type="submit">Login</button>
               
            </div>
        </form>
    </div>
    <!-- <script src="hospitalRegistration.js"></script> -->
</body>
</html>



