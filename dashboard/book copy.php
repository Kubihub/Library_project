<?php
include '../database/connection.php';

// Fetch books from the database
$sql = "SELECT b.booktitle, b.author, b.department, bf.filename, bf.filepath 
        FROM books b 
        LEFT JOIN bookfiles bf ON b.bookid = bf.bookid";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWL</title>
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
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
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
    
    <?php include "../php/components/sidebar.php"; ?>

    <!-- Main Start -->
    <main>
        <div class="header">
            <h1>Library Dashboard</h1>
            <ul class="breadcrumb">
                <li><a href="#" class="active">Books</a></li>
                /
                <li><a href="#">Content</a></li>
            </ul>
        </div>

        <!--============= Book List Start ===============-->
        <div class="book-list">
            <h2>Available Books</h2>
            <div class="card-container">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="card">';
                        echo '<h3>' . htmlspecialchars($row['booktitle']) . '</h3>';
                        echo '<p>Author: ' . htmlspecialchars($row['author']) . '</p>';
                        echo '<p>Department: ' . htmlspecialchars($row['department']) . '</p>';
                        if ($row['filename']) {
                            echo '<p><a href="' . htmlspecialchars($row['filepath']) . '" target="_blank">' . htmlspecialchars($row['filename']) . '</a></p>';
                        }
                        echo '</div>';
                    }
                } else {
                    echo '<p>No books available.</p>';
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
        <!--============= Book List End ===============-->

        <!--============= Bottom Data Start ===============-->
        
                <!-- Additional content here if needed -->
            </div>
            <!--============= Reminder Close ===============-->
        </div>
        <!--============= Bottom Data End ===============-->
    </main>
    <!-- Main Close -->
</div>
<!-- =============Content Close================ -->

<script src="js/main.js"></script>
</body>
</html>
