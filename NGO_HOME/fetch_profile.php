<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "ngo1"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user profile data from the database
$sql = "SELECT * FROM volunteers ORDER BY id DESC LIMIT 1";// Assuming user ID 1 for demonstration, replace with actual user ID
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    echo '
        <div class="profile-details">
            <h1>Profile</h1>
            <img src="'.$row["image"].'" alt="Profile Picture" class="profile-picture" >
            <div class="profile-info">
               
                <div class="profile-data">
                   <div class="pro1">
                   <p>Name: '.$row["name"].'</p>
                   <br>
                   <p>Age: '.$row["age"].'</p>
                   <br>
                   <p>Volunteer Id : VI876512</p>
                   <br>
                   <p>Phone: '.$row["phone"].'</p>
                   <br>
                   </div>

                   <div class="pro2">
                   <p>Adress: '.$row["address"].'</p>
                   <br>
                   <p>Email: '.$row["email"].'</p>
                   <br>
                   <p>Aadhar Number: '.$row["aadhar"].'</p>
                   <br>
                   <p>PAN Card Number: '.$row["pan"].'</p>
                   </div>
                </div>
                <div>
                
                </div>
            </div>
        </div>
    ';
} else {
    echo "0 results";
}
$conn->close();
?>
