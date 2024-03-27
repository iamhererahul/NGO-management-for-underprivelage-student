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
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$aadhar = $_POST['aadhar'];
$pan = $_POST['pan'];
$phone = $_POST['phone'];

// Upload image
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["image"]["size"] > 5000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Insert data into database
$sql = "INSERT INTO volunteers (name, age, email, password, address, aadhar, pan, phone, image) VALUES ('$name', $age, '$email', '$password', '$address', '$aadhar', '$pan', '$phone', '$targetFile')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the next page upon successful registration
    header("Location: volunteer-login.html");
    exit(); // Ensure no further code is executed after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
