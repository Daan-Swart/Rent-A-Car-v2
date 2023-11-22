<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=rent-a-car", $dbUsername, $dbPassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
