<?php
// File: classes/Book.php
class Book {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Function to fetch books from the database
    public function getBooks() {
        $sql = "SELECT b.booktitle, b.author, b.department, bf.filename, bf.filepath 
                FROM books b 
                LEFT JOIN bookfiles bf ON b.bookid = bf.bookid";

        $result = mysqli_query($this->conn, $sql);

        // Return the results as an array
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
