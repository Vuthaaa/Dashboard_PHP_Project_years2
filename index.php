<?php
session_start();
//connect to database
$db = mysqli_connect("localhost", "root", "", "stock_managment");
if (isset($_POST['register_btn'])) {
    $Fname = mysqli_real_escape_string($db, $_POST['first_name']);
    $Lname = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
    // var_dump($_POST);
    $query = "SELECT * FROM Users WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    // echo $result;
    if ($result) {

        if (mysqli_num_rows($result) > 0) {

            echo '<script language="javascript">';
            echo 'alert("email already exists")';
            echo '</script>';
        } else {

            if ($password == $confirm_password) {           
                $password = md5($password); 
                $sql = "INSERT INTO users(first_name, last_name , email, password ) VALUES('$Fname', '$Lname' ,'$email','$password')";
                mysqli_query($db, $sql);
                $_SESSION['loggedin'] = true;
                $_SESSION['first_name'] = $Fname;
                $_SESSION['last_name'] = $Lname;
                $_SESSION['message'] = "You are now logged in";
                $_SESSION['email'] = $email;
                header("location: login.php");  //redirect home page
            } else {
                echo '<script language="javascript">';
                echo 'alert("email already exists")';
                echo '</script>';
            }
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Stocks Management </title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
<?php
        if (isset($_SESSION['message'])) {
            echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
        }
        ?>
	<div class="screen">
		<div class="screen__content">
        
			<form class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Create Account</h1>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="first_name" class="login__input" placeholder="First Name">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="last_name" class="login__input" placeholder="Last Name">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" name="email" class="login__input" placeholder="Email">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="login__input" placeholder="Password">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="confirm_password" class="login__input" placeholder="Confirm Password">
				</div>
				<button class="button login__submit" type="submit" name="register_btn">
					<span class="button__text">Register</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
                <br>
                <h5>Already have an account? <a href="login.php">Login here</a>.</h5>	
			</form>
			<div class="social-login">
				<h3>Register by</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
            
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->
  
</body>
</html>
