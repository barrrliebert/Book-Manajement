<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$mysqli = mysqli_connect($servername, $username, $password, $dbname);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
