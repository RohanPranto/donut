<?php
// Include db_connection.php to establish a database connection
include 'db_connection.php';

// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to login page or show error message
}

// Check if the productID is set in the POST request
if(isset($_POST['productID'])) {
    // Get product ID from POST request
    $productID = $_POST['productID'];

    // Get user ID from session
    $userID = $_SESSION['userID'];

    // Insert item into cart
    $sql = "INSERT INTO Cart (UserID, ProductID, Quantity) VALUES ('$userID', '$productID', 1)";

    if ($conn->query($sql) === TRUE) {
        echo "Item added to cart successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Product ID not provided";
}

// Close the database connection
$conn->close();
?>
