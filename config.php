<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "magazin_zoologic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error connecting: " . $conn->connect_error);
}
?>