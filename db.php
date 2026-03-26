<?php
$host = "petshop-db.c52yk80igyaj.ap-southeast-2.rds.amazonaws.com";
$user = "admin";
$pass = "petshop1234";
$dbname = "petshop";

$conn = mysqli_connect($host, $user, $pass, $dbname);


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
