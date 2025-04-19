<?php
$servername = "localhost";
$username = "parthaadthakkar_hf";
$password = "@234abcDEF";
$dbname = "parthaadthakkar_hf";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Error," . mysqli_connect_error());
}
?>