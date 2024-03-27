<?php
// Include database connection
include 'config.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare data for insertion
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $phone = $_POST['phone'];
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $institute = $_POST['institute'];

    // Insert data into database
    $sql = "INSERT INTO students (name, age, gender, address, aadhar, pan, phone, email, institute) 
            VALUES ('$name', $age, '$gender', '$address', '$aadhar', '$pan', '$phone', '$email', '$institute')";
    if (mysqli_query($conn, $sql)) {
        echo "Student registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fetch student data from the database
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>
