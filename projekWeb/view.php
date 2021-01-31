<?php 
session_start();
include_once("dbconnect.php");

// if (isset($_COOKIE["username"])){
//   echo "Value is: " . $_COOKIE["username"];
// }

if (isset($_SESSION["name"])){
	echo "WELCOME " .$_SESSION["name"];

$sql = "SELECT * FROM customer";

//execute the query

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Mainpage</title>
	 <!-- to make it looking good im using bootstrap -->
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
  body {
	background-image: url(https://techcrunch.com/wp-content/uploads/2017/05/gettyimages-580833893.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
  }
  .page {
            background-color: #ffffff;
            padding: 10px;
			border: 3px solid #000000;
        }
        
  </style>
</head>
<body>
<br><br>
		<h1 align="center">CAR RENTAL</h1>
		
	<div class="container">
	<button type="button" ><a href="login.php"> Login </a><br></button>
		<p> (N/A = Not Available , Not Applicable) </P>
		
			<div class="page">
			<button type="button"><a href="create.php">New Rental</a></button><br><br>
				<table class="table">
					<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Ic</th>
					<th>Date Rent</th>
					<th>Address (full address)</th>
					<th>Phone Number</th>
					<th>Car (with plate no.)</th>
					<th>Time start</th>
					<th>Time finish</th>
					<th>Total Rent (RM)</th>
					<th>Action</th>
					</tr>
				
	  		<tbody>	
		<?php
			if ($result->rowCount() > 0) {
				//output data of each row
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		?>

				<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['custname']; ?></td>
				<td><?php echo $row['gender']; ?></td>
				<td><?php echo $row['ic']; ?></td>
				<td><?php echo $row['daterental']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['phonenumber']; ?></td>
				<td><?php echo $row['car']; ?></td>
				<td><?php echo $row['timestart']; ?></td>
				<td><?php echo $row['timefinish']; ?></td>
				<td><?php echo $row['totalrent']; ?></td>
				<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a><br>
				&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
				</tr>	
					
		<?php		}
			}
		}else{
			echo "<script> alert('Session Expired!!!')</script>";
			echo "<script> window.location.replace('login.html') </script>;";
		  }
		  $conn = null;

		?>
	        	
	   		</tbody>
 	</table>
</div>

</body>
</html>