<?php

$host = "localhost";
$dbname = "my_dummy_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_error()){
    die("Connection Error: " . mysqli_connect_error());
}

?>