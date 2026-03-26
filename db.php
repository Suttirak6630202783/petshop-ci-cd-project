<?php
$host = "localhost";
$user = "root";
$pass = "123456";
$dbname = "petshop";

$conn = mysqli_connect($host, $user, $pass, $dbname);


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
