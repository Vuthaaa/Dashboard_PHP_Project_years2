



<?php
$db = mysqli_connect("localhost", "root", "", "stock_managment");

$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM admin WHERE id = '$id'");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);
var_dump($resultData);
$Fname = $resultData['first_name'];
$Lname = $resultData['last_name'];
$email = $resultData['email'];
$password = $resultData['password'];
?>





<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Stocksmanagement</title>
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
        
			<form class="login" action="adEditActionAdmin.php" method="post" enctype="multipart/form-data">
            <h1>Edit Admin</h1>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input class="login__input" type="text" name="first_name" value="<?php echo $Fname; ?>" placeholder="First Name">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input class="login__input" type="text" name="last_name" value="<?php echo $Lname; ?>" placeholder="Last Name">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input class="login__input" type="text" name="email" value="<?php echo $email; ?>" placeholder="Email">
				</div>
				<div class="login_field">
				<input type="hidden" name="old-image" value="<?php echo $resultData['image']; ?>">

				</div>
				<div class="logi_field">
					<input type="file" name = "image" id="inimg">
					<img src="#" id="newImg" alt="" width="50" >
				</div>
				<input class="login__input" type="hidden" name="id" value=<?php echo $id; ?>> 
                <!-- <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="login__input" placeholder="Password">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="confirm_password" class="login__input" placeholder="Confirm Password">
				</div> -->
				<button class="button login__submit" type="submit" name="update" value="Update">>
					<span class="button__text">Confirm</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
                <br>
                <!-- <h5>Already have an account? <a href="login.php">Login here</a>.</h5>	 -->
			</form>
			<!-- <div class="social-login">
				<h3>Register by</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div> -->
            
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<script>

inimg.onchange= vt=>
    {
      const[file]=inimg.files
      if(file)
      {
        newImg.src=URL.createObjectURL(file)
      }
    }

</script>
<!-- partial -->
  
</body>
</html>

