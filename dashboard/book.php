<?php


// File: book.php
include '../database/connection.php';
include '../classes/books.php';

// Instantiate the Book class
$book = new Book($conn);

// Fetch books
$books = $book->getBooks();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWL</title>
    <link rel="stylesheet" href="../css/books.css">
    <link rel="stylesheet" href="../css/main.css">
    
    
</head>
<body>

<div class="content">
    <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
            <div class="form-input">
                 <input type="search" id="searchInput" placeholder="Search................" />
                <button type="submit" id="searchButton">Search<i class="bx bx-search"></i></button>
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
                if ($books) {
                    foreach ($books as $book) {
                        echo '<div class="card">';
                        echo '<h3>' . htmlspecialchars($book['booktitle']) . '</h3>';
                        echo '<p>Author: ' . htmlspecialchars($book['author']) . '</p>';
                        echo '<p>Department: ' . htmlspecialchars($book['department']) . '</p>';
                        if ($book['filename']) {
                            echo '<p><a href="' . htmlspecialchars($book['filepath']) . '" target="_blank">Read Book</a></p>';
                        }
                        echo '</div>';
                    }
                } else {
                    echo '<p>No books available.</p>';
                }

                mysqli_close($conn);
                ?>
                <div id="output"></div>
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
<script src="dashboard/js/search.js"></script>
</body>
</html>
