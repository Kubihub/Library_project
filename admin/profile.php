<?php
include '../database/connection.php';

// Fetch users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$conn->close();
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
        <a href="" class="logo">
            <img src="../assets/img/gwl_logo.jpg" alt="" width="100" height="50"/>
            <span>Ghana</span>Water
        </a>
        <ul class="side-menu">
            <li class="active">
                <a href="../../index.php"><i class="bx bxs-dashboard"></i>Home</a>
            </li>
            <li>
                <a href="journal.php"><i class="bx bx-video"></i>Journals</a>
            </li>
            <li>
                <a href="book.php"><i class="bx bx-bar-chart"></i>Books</a>
            </li>
            <li>
                <a href="profile.php"><i class="bx bx-comment-detail"></i>Profile</a>
            </li>
            <!-- <li>
                <a href="settings.php"><i class="bx bx-cog"></i>Settings</a>
            </li> -->
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
                <li><a href="#" class="active">Profile</a></li>
                /
                <li><a href="#">Content</a></li>
            </ul>
        </div>

        <!--============= User List Start ===============-->
       
        <!--============= User List End ===============-->

        

        <!--============= Bottom Data Start ===============-->
        <div class="bottom_data">
            <div class="orders">
                <div class="header">
                    <h3>Recent Profiles</h3></div>

                    <div class="orders">
                    <ul>
            <?php 
                // LOOP TILL END OF DATA
                while($rows = $result->fetch_assoc()) {
            ?>
            <li>
                <strong>First Name:</strong> <?php echo htmlspecialchars($rows['firstname']); ?><br>
                <strong>Last Name:</strong> <?php echo htmlspecialchars($rows['lastname']); ?><br>
                <strong>Staff ID:</strong> <?php echo htmlspecialchars($rows['staffid']); ?><br>
                <strong>Email:</strong> <?php echo htmlspecialchars($rows['email']); ?><br>
            </li>
            <hr> <!-- To separate each user's info visually -->
            <?php
                }
            ?>
        </ul>
                    </div>
                </div>

            </div>

            <!--============= Reminder Start ===============-->
            
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
