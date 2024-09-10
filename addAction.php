<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
$db = mysqli_connect("localhost", "root", "", "stock_managment");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$Fname = mysqli_real_escape_string($db, $_POST['first_name']);
	$Lname = mysqli_real_escape_string($db, $_POST['last_name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
    
   
		
	// Check for empty fields
	if (empty($Fname) || empty($Lname) || empty($email)) {
		if (empty($Fname)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if (empty($Lname)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
        // if (empty($password)) {
		// 	echo "<font color='red'>Password field is empty.</font><br/>";
		// }
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($db, "INSERT INTO Users (`first_name`, `last_name`, `email` ) VALUES ('$Fname', '$Lname', '$email' )");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='4_pro.php'>View Result</a>";
	}
}
?>
</body>
</html>
