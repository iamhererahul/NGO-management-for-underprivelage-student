<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exists'; 
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password does not match!';
      }elseif($image_size > 2000000){
         $message[] = 'Image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `admin`(name, email, password, age, contact_number, address, image) VALUES('$name', '$email', '$pass', '$age', '$contact_number', '$address', '$image')") or die('Query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully!';
            header('location: admin-login.php');
         }else{
            $message[] = 'Registration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="login.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $msg){
            echo '<div class="message">'.$msg.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <input type="text" name="age" placeholder="Enter age" class="box" required>
      <input type="text" name="contact_number" placeholder="Enter contact number" class="box" required>
      <input type="text" name="address" placeholder="Enter address" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register now" class="btn">
      <p>Already have an account? <a href="admin-login.php">Login now</a></p>
   </form>

</div>

</body>
</html>
