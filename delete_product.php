<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock_managment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete product from the database
    $sql = "DELETE FROM product_tb WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ad_bill.php?success=1");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid product ID.";
}

$conn->close();
?>
