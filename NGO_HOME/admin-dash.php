<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

$select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
   $fetch = mysqli_fetch_assoc($select);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <!-- <link rel="stylesheet" href="admin-dash.css"> -->
   <style>
   * {
      margin: 0;
      padding: 0;
  }

   .profile{

    background: linear-gradient(to right, aqua , white);
    border-radius: 10px;
    box-shadow: 10px 10px 40px black, -10px -10px 40px #ffffff;
    height: 350px;
    margin: auto;

  }

  .container {

      display: flex;
      justify-content: center;
      height: 100vh;
  }
  
  .profile {
      padding: 20px;
      background-color: white;
      width: 350px;
      background: white;
      height: 100%;
  }
  
  .profile img {
      height: 150px;
      width: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 5px;
      margin-left: 95px;
  }
  
  .container .profile h3 {
      margin-top: 10px;
      font-size: 20px;
    
      margin-left: 140px;
  }
  
  .profile p {
      margin-top: 20px;
      color: var(--black);
      font-size: 20px;
  }
  
  .profile p a {
      color: var(--red);
  }
  
  .profile p a:hover {
      text-decoration: underline;
  }
  
  .admin-content {
      width: 80%;
      padding: 20px;
      background: transparent;
      /* background-color:white; */
      background: linear-gradient(to right, aqua, white );
    border-radius: 10px;
    box-shadow: 10px 10px 40px black, -10px -10px 40px #ffffff;
    margin-left:px;
    height: 100vh;
  }
  
  .admin-content h1 {
      color: black;
      font-weight: bold;
      font-size: 48px;
  }
  
  .admin-content div {
      margin-bottom: 20px;
  }
  
  .admin-content h2 {
      color: black;
      border-bottom: 1px solid #ddd;
      padding-bottom: 0px;

  }
  
  
 
  
  .program-functions,
  .volunteer-functions,
  .documentation-functions {
      display: flex;
      opacity: 1;
  }
  
  
 
  .program-functions a,
  .volunteer-functions a,
  .documentation-functions a {
      display: inline-block;
      margin-right: 10px;
      padding: 8px 15px;
      background-color: rgb(0, 141, 218);
      color: white;
      text-decoration: none;
      border-radius: 4px;
  }
  
  
  
  
  .program-functions a:hover,
  .volunteer-functions a:hover,
  .documentation-functions a:hover {
      background-color: #050505;
  }
  
  .button {
      padding: 10px 20px;
      background-color: rgb(0, 141, 218);
      color: rgb(0, 141, 218);
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      font-family: 'Times New Roman', Times, serif;
      font-size: 15px;
      
  }
  
  .button:hover {
      background-color: black;

  }
  
  .user-management a {
      text-decoration: none;
      color: white;
  }
  
  .bot {
      padding: 10px 20px;
      background-color: rgb(0, 141, 218);
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 20px;
      font-family: 'Times New Roman', Times, serif;
      font-size: 15px;
  }
  
  .bot a {
      text-decoration: none;
      color: white;
  }
</style>
</head>

<body style="background-color: linear-gradient(to right, aqua, white);
">
   
<div class="container">  
   <div class="profile">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <p>Name : AVNIT JAI SINGH</p>
      <p>Age: <?php echo $fetch['age']; ?></p>
      <p>Contact Number: <?php echo $fetch['contact_number']; ?></p>
      <p>Email: <?php echo $fetch['email']; ?></p>
      <p>Address: <?php echo $fetch['address']; ?></p>
      <p>Aadhar Card: 8221 6338 9497</p>
      <p>Pan Card: QVJP6497K</p>
      <br>
      <button class="bot"> <a href="update_profile.php" class="btn">Update Profile</a></button>
      <button class="bot"><a href="login.php?logout=<?php echo $user_id; ?>" class="delete-btn">Logout</a></button>
   </div>

   <div class="admin-content">
      <center><h1>Welcome to the Admin Panel</h1></center>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="user-management">
         <h2>Volunteer Management</h2>
         <br>
         <button class="button"><a href="volunteer-detail.php">View All Volunteers</a></button>
         <button class="button"><a href="adduser.php">Add Volunteer</a></button>

      </div>
      <div class="program-management">
         <h2>Program Management</h2>
         <br>
         <div class="program-functions">
            <a href="add-program1.php" id="createProgramBtn">Create Program</a>
            <!-- <a href="#" id="updateProgramBtn">list of Program</a> -->
            <a href="institutes.html" id="partnershipsBtn">Coaching Institute Partnerships</a>
            <a href="session.html" id="sessionSchedulesBtn">Session Schedules</a>
         </div>
      </div>
      
      <div class="volunteer-coordination">
         <h2>Volunteer Coordination</h2>
         <br>
         <div class="volunteer-functions">
            <a href="admin_chat.html" id="onboardVolunteersBtn">Communicate with volunteers</a>
            <a href="assign-task.html" id="assignTasksBtn">Assign Tasks</a>
            <a href="volunteer-task.php" id="assignTasksBtn">View assigned Tasks</a>
            <a href="monitor.html" id="monitorPerformanceBtn">Monitor Performance</a>
         </div>
      </div>
      
      <div class="documentation-recognition">
         <h2>Documentation and Certification</h2>
         <br>
         <div class="documentation-functions">
            <a href="recommendation-letter.html" id="generateCertificateBtn">Letter of Recommendation</a>
            <a href="volunteer-certificate.html" id="generateCertificateBtn">Generate Certificate</a>
           
         </div>
      </div>
  
    </div>
   
</div>
<script src="admin-dash.js"></script>
</body>
</html>
