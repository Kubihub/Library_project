<?php
// File: classes/Journal.php
class Journal {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Function to fetch books from the database
    public function getJournals() {
        $sql = "SELECT j.journaltitle, jf.filename, jf.filepath 
                FROM journals j 
                JOIN journalfiles jf ON j.journalid = jf.journalid 
                ORDER BY jf.id DESC 
                LIMIT 1";

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
