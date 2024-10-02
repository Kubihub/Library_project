<?php
include '../database/connection.php';

// Fetch journals from the database
$sql = "SELECT j.journaltitle, j.author, j.department, jf.filename, jf.filepath 
        FROM journals j 
        LEFT JOIN journalfiles jf ON j.journalid = jf.journalid";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journals - GWL</title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 15px;
            width: calc(33.333% - 40px);
            display: inline-block;
            vertical-align: top;
        }
        .card h3 {
            margin: 0 0 10px;
            font-size: 1.2em;
        }
        .card p {
            margin: 0;
            color: #555;
        }
        .card a {
            color: #007bff;
            text-decoration: none;
        }
        .card a:hover {
            text-decoration: underline;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    </style>
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
            <img src="../assets/img/gwl_logo.jpg" alt="" />
            <span>Ghana</span>Water
        </a>
        <ul class="side-menu">
            <li>
                <a href="../../index.php"><i class="bx bxs-dashboard"></i>Home</a>
            </li>
            <li class="active">
                <a href="journal.php"><i class="bx bx-video"></i>Journals</a>
            </li>
            <li>
                <a href="book.php"><i class="bx bx-bar-chart"></i>Books</a>
            </li>
            <li>
                <a href="profile.php"><i class="bx bx-comment-detail"></i>Profile</a>
            </li>
            <li>
                <a href="setting.php"><i class="bx bx-cog"></i>Settings</a>
            </li>
        </ul>

        <div class="side-menu">
            <ul>
                <li>
                    <a href="#"><i class="bx bx-moon"></i>Dark / Light</a>
                </li>
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
            <h1>Journals</h1>
            <ul class="breadcrumb">
                <li><a href="#" class="active">Journals</a></li>
                <li><a href="#">Content</a></li>
            </ul>
        </div>

        <!--============= Journal List Start ===============-->
        <div class="card-container">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">';
                    echo '<h3>' . htmlspecialchars($row['journaltitle']) . '</h3>';
                    echo '<p>Author: ' . htmlspecialchars($row['author']) . '</p>';
                    echo '<p>Department: ' . htmlspecialchars($row['department']) . '</p>';
                    if ($row['filename']) {
                        echo '<p><a href="' . htmlspecialchars($row['filepath']) . '" target="_blank">' . htmlspecialchars($row['filename']) . '</a></p>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>No journals available.</p>';
            }

            mysqli_close($conn);
            ?>
        </div>
        <!--============= Journal List End ===============-->
    </main>

</div>

<script src="js/main.js"></script>
</body>
</html>
