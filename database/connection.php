<?php

$host = "localhost";
$dbname = "libdb";
$username = "root";
$password = "";

$conn = new mysqli($host,$username,$password,$dbname);
if ($conn->connect_error){
    die("connection Failed". $conn->connect_error);
}

