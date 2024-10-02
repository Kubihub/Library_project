<?php
session_start();
include '../database/connection.php';

// Check if the user is logged in
if (isset($_SESSION['staffid'])) {
    $staffid = $_SESSION['staffid'];

    // Fetch the logged-in user's information
    $sql = "SELECT * FROM users WHERE staffid='$staffid'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }

    $conn->close();
} else {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWL</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<div class="content">
    <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
            <div class="form-input">
                <!-- <input type="search" placeholder="Search................" /> -->
                <button type="submit"><i class="bx bx-search"></i></button>
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
    <div class="sidebar">
        <a href="#" class="logo">
            <img src=../assets/img/gwl_logo.jpg alt="" />
            <span>Ghana</span>Water
        </a>
        <ul class="side-menu">
            <li>
                <a href="../../index.php"><i class="bx bxs-dashboard"></i>Home</a>
            </li>
            <li>
                <a href="journal.php"><i class="bx bx-video"></i>Journals</a>
            </li>
            <li>
                <a href="book.php"><i class="bx bx-bar-chart"></i>Books</a>
            </li>
            <li class="active">
                
                <a href="profile.php"><i class="bx bx-comment-detail"></i>Profile</a>
            </li>
            <li>
                <a href="settings.php"><i class="bx bx-cog"></i>Settings</a>
            </li>
        </ul>

        <div class="side-menu">
            <ul>
                <!-- <li>
                    <a href="#"><i class="bx bx-moon"></i>Dark / Light</a>
                </li> -->
                <li>
                    <a href="#" class="logout"><i class="bx bx-log-out-circle"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- =============Sidebar Close================ -->

    <!-- Main Start -->
    <main>
        <div class="header">
            <h1>Library Dashboard</h1>
            <ul class="breadcrumb">
                <li><a href="#" class="active">Books</a></li>
                <li><a href="#">Content</a></li>
            </ul>
        </div>

        <!--============= User Profile Start ===============-->
        <div class="orders">
            
        </div>
   

        <!--============= Profile Information ===============-->
        <div class="bottom_data">
            <div class="orders">
                <div class="header">
                    <h3>Your Profile Information</h3> </div>
            <ul>
                <li><strong>First Name:</strong> <?php echo htmlspecialchars($user['firstname']); ?></li>
                <li><strong>Last Name:</strong> <?php echo htmlspecialchars($user['lastname']); ?></li>
                <li><strong>Staff ID:</strong> <?php echo htmlspecialchars($user['staffid']); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                <li><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></li>
                <li><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></li>
            </ul>
                </div>
            </div>

            <!--============= Profile Information ===============-->
            
            <!--============= Reminder End ===============-->
        </div>
        <!--============= Bottom Data End ===============-->
    </main>
    <!-- Main Close -->
</div>
<!-- =============Content Close================ -->

<script src="js/main.js"></script>
</body>
</html>
