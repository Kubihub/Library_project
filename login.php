<?php


include 'database/connection.php';




if(isset($_POST['loginattempt'])){

$staffid = $_POST['staffid'];
$psw = $_POST['psw'];

$userquery = $conn->query(" SELECT * FROM users WHERE staffid = '$staffid' ");

if ($userquery->num_rows > 0){


  $user_row = $userquery->fetch_assoc();
  if(password_verify($psw, $user_row['password_hash'])){

// Start the session

session_start();

    $_SESSION['staffid'] = $user_row['staffid'];
    $_SESSION['firstname'] = $user_row['firstname'];
    $_SESSION['lastname'] = $user_row['lastname'];
    $_SESSION['role'] = $user_row['role'];
  
    switch ($_SESSION['role']) {
      case 'Admin':
        header('Location: admin/book.php');
        break;
      case 'User';
        header('Location: dashboard/book.php');
    }

    
  }else{
    echo "wrong password ";
  }
}else{
  echo 'no user found';
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <p></p>
    <form action="" method="post">
        <div class="imgcontainer">
          
        </div>
      
        <div class="container">
          <label for="staffid"><b>Staff ID</b></label>
          <input type="text" placeholder="Enter Staff ID" name="staffid" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <button type="submit" name="loginattempt">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>
      
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password</a></span>
        </div>
      </form>
</body>
</html>