<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "db_farm";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>