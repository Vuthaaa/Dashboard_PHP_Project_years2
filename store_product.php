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

$name = $_POST['name'];
$unit_price = $_POST['unit_price'];
$qty = $_POST['qty'];
$discount = $_POST['discount'];
$description = $_POST['description'];
$image = $_FILES['image']['name'];
$target_dir = "images/";
$target_file = $target_dir . basename($image);

// Ensure the images directory exists
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
    $sql = "INSERT INTO product_tb (name, unit_price, qty, discount, description, image)
    VALUES ('$name', '$unit_price', '$qty', '$discount', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ad_bill.php?success=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

$conn->close();
?>
