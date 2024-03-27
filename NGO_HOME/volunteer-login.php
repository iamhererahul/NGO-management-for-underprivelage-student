<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ngo1";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_GET['email'];
$password = $_GET['password'];

// Check if email and password match
$sql = "SELECT * FROM volunteers WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    echo "Login successful!";
    // Redirect the user to another page
    header("Location: volunteer-dash.php");
    exit(); // Ensure no further code is executed after redirection
} else {
    // Login failed
    echo "Invalid email or password";
    // You can redirect the user back to the login page or display an error message
}


$conn->close();
?>
