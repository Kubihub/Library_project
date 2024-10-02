<?php

include '../database/connection.php';



if (isset($_POST['submitattempt'])) {

  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $booktitle = mysqli_real_escape_string($conn, $_POST['booktitle']);
  $bookid = mysqli_real_escape_string($conn, $_POST['bookid']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);

  // Construct the SQL query
  $sql = "INSERT INTO books (author, booktitle, bookid, department) VALUES ('$author', '$booktitle', '$bookid', '$department')";

  // Execute the query and handle errors
  if (mysqli_query($conn, $sql)) {
      echo "";
  } else {
      echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
  }

  

// Handle file uploads

if (!empty($_FILES['filename']['name'])) {
  $uploadedFiles = $_FILES['filename'];

  $fileTmpPath = $uploadedFiles['tmp_name'];
  $fileName = $uploadedFiles['name'];
  $destinationPath = "../uploads/" . $fileName;

  if (move_uploaded_file($fileTmpPath, $destinationPath)) {
      // Insert file details into book_files table
      $sql = "INSERT INTO bookfiles (bookid, filename, filepath) VALUES ('$bookid', '$fileName', '$destinationPath')";
      mysqli_query($conn, $sql);
    echo 'Book successfully uploaded.';

  } else{
    echo "did not work";
  }
        
} else {
  ///
}


// Fetch recent uploads
$recentUploadsSql = "SELECT b.booktitle, bf.filename, bf.filepath 
                     FROM books b 
                     JOIN bookfiles bf ON b.bookid = bf.bookid 
                     ORDER BY bf.id DESC 
                     LIMIT 1";
$recentUploadsResult = mysqli_query($conn, $recentUploadsSql);

// Close the connection
mysqli_close($conn);


}

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
<?php 
      include "../php/components/admin_sidebar.php"; 
      ?>


    


      <!-- Main Start -->
      <main>
        <div class="header">
          <h1>Library Dashboard</h1>

          
          <ul class="breadcrumb">
            <li><a href="#" class="active">Books</a></li>
            
            <li><a href="#">Content</a></li>
          </ul>
        </div>

        <!--============= cards start ===============-->
        <form action="" method="post" enctype="multipart/form-data">
        <div class="imgcontainer">
          
        </div>
      
        <div class="container">
          <label for="author"><b>Author</b></label>
          <input type="text" placeholder="" name="author" required>
  
          <label for="booktitle"><b>Book Title</b></label>
          <input type="text" placeholder="" name="booktitle" required>

          <label for="bookid"><b>Book ID</b></label>
          <input type="text" placeholder="" name="bookid" required>

          <label for="department"><b>Department</b></label>
          <input type="text" placeholder="" name="department" required>
          
          <label for="filename"><b>Upload Books</b></label>
          <input type="file" id="" name="filename">
          <button type="submit" name="submitattempt">Submit</button>
        
        </div>
      
      
      </form>
        <!--============= bottom Data Start ===============-->
        <div class="bottom_data">
            <div class="orders">
                <div class="header">
                    <h3>Recent Uploads</h3>
                </div>
                <div class="orders-content">
                    <?php if (isset($recentUploadsResult) && mysqli_num_rows($recentUploadsResult) > 0): ?>
                        <ul>
                            <?php while ($row = mysqli_fetch_assoc($recentUploadsResult)): ?>
                                <li>
                                    <strong><?php echo htmlspecialchars($row['booktitle']); ?></strong> - 
                                    <a href="<?php echo htmlspecialchars($row['filepath']); ?>" target="_blank"><?php echo htmlspecialchars($row['filename']); ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p>No recent uploads found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</div>

    <script src="js/main.js"></script>
</body>
</html>