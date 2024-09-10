<?php
// Include the database connection file
$db = mysqli_connect("localhost", "root", "", "stock_managment");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($db, "DELETE FROM admin WHERE id = $id");

// Redirect to the main display page (index.php in our case)
header("Location: test.php");
?>