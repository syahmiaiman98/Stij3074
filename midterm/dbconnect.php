<?php
//connect to db
$servername = "sql110.epizy.com";
$username = "epiz_27509719";
$passworddb = "RU22BB7uDe0i";
$dbname = "epiz_27509719_bookdepo";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>