<?php
include_once("dbconnect.php");

//get data first
$ID = $_GET['ID'];
$foodName = $_GET['foodName']; 
$Price = $_GET['Price'];
$Quantity = $_GET['Quantity'];
$Calorie = $_GET['Calorie'];

//connect to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodinformation";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password)
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO foodregister(ID, foodName, Price, Quantity, Calorie)
    VALUES ('$ID', '$foodName', '$Price', '$Quantity', '$Calorie')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('New record has been created !')</script>";

}catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
  $conn = null;
?>