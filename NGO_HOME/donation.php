<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $citizenship = $_POST['citizenship'];
    
    // Database connection parameters
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username = "root"; // Replace with your actual database username
    $password = ""; // Replace with your actual database password
    $database = "ngo"; // Replace with your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO donations (title, firstName, lastName, gender, email, phone, amount, country, state, city, pincode, citizenship) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters to the SQL statement
    $stmt->bind_param("ssssssdsssss", $title, $firstName, $lastName, $gender, $email, $phone, $amount, $country, $state, $city, $pincode, $citizenship);
    
    // Execute the SQL statement
    if ($stmt->execute()) {
        // Donation data inserted successfully, redirect to confirmation page
        header("Location: donation-certificate.html");
        exit; // Ensure that no other content is sent after redirection
    } else {
        // If an error occurred during insertion, display error message
        echo "Error: " . $stmt->error;
    }
    

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
