<?php
$servername = "localhost";
$username = "root";
$passworddb = ""; // default password for localhost is empty
$dbname = "foodinformation"; // database name

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
