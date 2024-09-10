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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update product in the database
    $id = $_POST["id"];
    $name = $_POST["name"];
    $unit_price = $_POST["unit_price"];
    $qty = $_POST["qty"];
    $discount = $_POST["discount"];
    $description = $_POST["description"];

    $sql = "UPDATE product_tb SET name='$name', unit_price='$unit_price', qty='$qty', discount='$discount', description='$description' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ad_bill.php?success=1");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Fetch product data
    $id = $_GET["id"];
    $sql = "SELECT * FROM product_tb WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h2>Edit Product</h2>
        </div>
        <form action="edit_product.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price:</label>
                <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price" value="<?php echo $product['unit_price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="qty">Quantity:</label>
                <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $product['qty']; ?>" required>
            </div>
            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="number" step="0.01" class="form-control" id="discount" name="discount" value="<?php echo $product['discount']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
