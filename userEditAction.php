<?php
// Include the database connection file
$db = mysqli_connect("localhost", "root", "", "stock_managment");


if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($db, $_POST['id']);
	$Fname = mysqli_real_escape_string($db, $_POST['first_name']);
	$Lname = mysqli_real_escape_string($db, $_POST['last_name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);	
	
	// Check for empty fields
	if (empty($Fname) || empty($Lname) || empty($email)) {
		if (empty($Fname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($Lname)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($db, "UPDATE Users SET `first_name` = '$Fname', `last_name` = '$Lname', `email` = '$email' WHERE `id` = $id");
		
		// Display success message
		header("Location: 4_pro.php?success=1");
	}
}
?>
