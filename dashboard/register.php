<?php

include '../database/connection.php';

if (isset($_POST['registerattempt'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $staffid = $_POST['staffid'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $psw = $_POST['psw'];

    // Hash the password before saving it
    $hashed_password = password_hash($psw, PASSWORD_BCRYPT);

    // Check if the staff ID or email already exists in the database
    $userquery = $conn->query("SELECT * FROM users WHERE staffid = '$staffid' OR email = '$email'");

    if ($userquery->num_rows > 0) {
        echo "User with this Staff ID or Email already exists!";
    } else {
        // Insert the new user into the database, including phone, email, and role
        $insert_query = $conn->prepare("INSERT INTO users (firstname, lastname, staffid, phone, email, password_hash, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert_query->bind_param('sssssss', $firstname, $lastname, $staffid, $phone, $email, $hashed_password, $role);

        if ($insert_query->execute()) {
            echo "Registration successful! You can now log in.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form action="" method="post">
        <div class="imgcontainer"></div>
      
        <div class="container">
          <label for="firstname"><b>First Name</b></label>
          <input type="text" placeholder="Enter First Name" name="firstname" required>

          <label for="lastname"><b>Last Name</b></label>
          <input type="text" placeholder="Enter Last Name" name="lastname" required>
      
          <label for="staffid"><b>Staff ID</b></label>
          <input type="text" placeholder="Enter Staff ID" name="staffid" required>
       

          <label for="phone"><b>Phone</b></label>
          <input type="text" placeholder="Enter Phone Name" name="phone" required>

          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>

          <label for="role"><b>Role</b></label>
          <select name="role" required>
              <option value="User">User</option>
              <option value="Admin">Admin</option>
          </select>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <button type="submit" name="registerattempt">Register</button>
          
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password</a></span>
        </div>
      </form>
</body>
</html>
