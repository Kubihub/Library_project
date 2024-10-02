<?php
session_start(); // Start the session
include '../database/connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitattempt'])) {
    // Retrieve form data
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

    // Retrieve the current user's ID from session
    $staffId = $_SESSION['staffid'];

    // Fetch the current hashed password from the database
    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE staffid = ?");
    $stmt->bind_param("i", $staffId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $currentHash = $user['password_hash'];

        // Verify the old password
        if (password_verify($oldPassword, $currentHash)) {
            if ($newPassword === $confirmPassword) {
                // Hash the new password
                $newHash = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE staffid = ?");
                $stmt->bind_param("si", $newHash, $staffId);
                $stmt->execute();
                
                echo "Password changed successfully.";
            } else {
                echo "New password and confirmation do not match.";
            }
        } else {
            echo "Old password is incorrect.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWL</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
    
</head>
<body>

<div class="content">
      <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
          <div class="form-input">
            <!-- <input type="search" placeholder="Search................" />
            <button type="submit"><i class="bx bx-search"></i></button> -->
          </div>
        </form>
        <!-- <a href="#" class="notification">
          <i class="bx bx-bell"></i>
          <span>12</span>
        </a>

        <a href="#" class="profile">
          <img src="./img/logo-1.png" alt="" />
        </a> -->
      </nav>

<!-- =============Sidebar Start================ -->
<?php 
      include "../php/components/sidebar.php"; 
      ?>


    


      <!-- Main Start -->
      <main>
        <div class="header">
          <h1>change password</h1>

          
          <ul class="breadcrumb">
            <li><a href="#" class="active">Settings</a></li>
            
            <li><a href="#">Content</a></li>
          </ul>
        </div>

        <!--============= cards start ===============-->
        <form action="" method="post" enctype="multipart/form-data">
        <div class="imgcontainer">
          
        </div>
      
        <div class="container">
          <label for="oldpassword"><b>Old Password</b></label>
          <input type="password" placeholder="oldpassword" name="oldpassword" required>
  
          <label for="newpassword"><b>New Password</b></label>
          <input type="password" placeholder="newpassword" name="newpassword" required>

          <label for="confirmpassword"><b>Confirm Password</b></label>
          <input type="password" placeholder="confirmpassword" name="confirmpassword" required>
         
          <button type="submit" name="submitattempt">Submit</button>
        
        </div>
      
      
      </form>
        <!--============= bottom Data Start ===============-->
        
    </main>
</div>

    <script src="js/main.js"></script>
</body>
</html>