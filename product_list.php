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

// Fetch products from the database
$sql = "SELECT id, name, unit_price, qty, discount, description, image FROM product_tb";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
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
        .alert {
            text-align: center;
        }
        .product-row {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .product-image {
            max-width: 100px;
            margin-right: 20px;
        }
        .product-details {
            flex: 1;
        }
        .product-details p {
            margin: 0;
            font-size: 1rem;
        }
        .product-details .product-name {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .product-actions {
            display: flex;
            flex-direction: column;
        }
        .product-actions a {
            margin: 2px 0;
        }
        .add-product-btn {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .add-product-btn a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h2>Product List</h2>
        </div>
        <div class="add-product-btn">
            <a href="index.html" class="btn btn-secondary">Add Products</a>
        </div>
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<div class="alert alert-success" role="alert">Product added successfully!</div>';
        }

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product-row'>";
                echo "<img src='images/" . $row["image"] . "' class='product-image' alt='Product Image'>";
                echo "<div class='product-details'>";
                echo "<p class='product-name'>" . $row["name"] . "</p>";
                echo "<p>Price: $" . $row["unit_price"] . "</p>";
                echo "<p>Quantity: " . $row["qty"] . "</p>";
                echo "<p>Discount: " . $row["discount"] . "%</p>";
                echo "<p>Description: " . $row["description"] . "</p>";
                echo "</div>";
                echo "<div class='product-actions'>";
                echo "<a href='edit_product.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a>";
                echo "<a href='delete_product.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
