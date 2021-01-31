<?php
session_start();
include_once("dbconnect.php");

$username = $_POST['username']; 
$password = sha1($_POST['password']);

try {
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $users = $stmt->fetchAll();  

    if ($count > 0){
        foreach($users as $user) {
            $userid = $user['userid'];
            $name = $user['name'];
        } 
        setcookie("timer", "10s", time()+10000000,"/");

        $_SESSION["name"] = $name;
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;

        //setcookie("username", $username, time()+60,"/");
        //setcookie("matric", $matric, time()+60,"/");
        //setcookie("name", $name, time()+60,"/");
        
        echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('view.php?userid=".$userid."&name=".$name."') </script>;";
    }else{
        echo "<script> alert('Login Failed')</script>";
        echo "<script> window.location.replace('login.html') </script>;";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  $conn = null;
?>