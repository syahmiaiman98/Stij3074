<?php 
session_start();
include_once("dbconnect.php");



$sql = "SELECT * FROM foodorder";

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

  .page {
            background-color: #ffffff;
            padding: 10px;
            opacity: ;
			      border: 3px solid #000000;
        }
        
  </style>
</head>
<body>
<br><br>
		<h1 align="center" style=>Food Menu</h1>
		
	<div class="container">
		
			<div class="page">
			<button type="button"><a href="create.php">New store</a></button><br><br>
				<table class="table">
					<tr>
					<th>ID</th>
					<th>Food Name</th>
					<th>Price (RM)</th>
					<th>Quantity</th>
					<th>Calorie (k/cal)</th>
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
				<td><?php echo $row['foodname']; ?></td>
				<td><?php echo $row['price']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['calorie']; ?></td>
				<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a><br><br>
				<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
				</tr>	
					
		<?php		}
			}
		?>
	        	
	   		</tbody>
 	</table>
</div>

</body>
</html>