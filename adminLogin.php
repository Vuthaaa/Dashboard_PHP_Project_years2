<?php
session_start();
//connect to database
$db = mysqli_connect("localhost", "root", "", "stock_managment");
if(isset($_POST['login_btn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password) ;
    
    $sql="SELECT * FROM admin WHERE email='$email' and password='$password'";
    $result=$db->query($sql);
    if($result->num_rows>0){
     session_start();
     $row=$result->fetch_assoc();
     $_SESSION['email']=$row['email'];
    header("Location: ad_das.php");
    $sql="UPDATE `loginstatus` SET `loginemail`= '$email'  WHERE loginid=1";
    $result=$db->query($sql);

    exit();
     
   
 
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Incorrect Username or Password")';
        echo '</script>';
    }
 
 }
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Stocksmanagement</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="./sty.css">

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
            <h1>Admin Login</h1>
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" name="email" class="login__input" placeholder="Email" autocomplete="new-email">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="login__input" placeholder="Password" autocomplete="new-password">
				</div>
				<button class="button login__submit" type="submit" name="login_btn">
					<span class="button__text">Login</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
                <br>
                <h5>User Login <a href="login.php">User</a>.</h5>	<br>	
                <h5>Register Admin <a href="adminRegister.php">Here</a>.</h5>	
                
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