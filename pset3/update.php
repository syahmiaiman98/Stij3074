<?php 
include_once("dbconnect.php");

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $foodname = $_POST['foodname'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $calorie = $_POST['calorie'];


		// write the update query
        $sql = "UPDATE `foodorder` SET `foodname`='$foodname',`price`='$price',`quantity`='$quantity',
        `calorie`='$calorie' WHERE `id` = '$id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "<script> alert('Update Success')</script>";
			echo "<script> window.location.replace('view.php') </script>;";
		}else{
			echo "<script> alert('Update Error')</script>";
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `foodorder` WHERE `id`='$id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->rowCount() > 0) {
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$foodname = $row['foodname'];
			$price = $row['price'];
			$quantity = $row['quantity'];
			$calorie = $row['calorie'];
			$id = $row['id'];
		}

	?>
	
<!DOCTYPE html>
	<html>
    	<head>
		<br><br><br>
        	<title>Update Car Rental</title>
    	</head>

    <body>
    <h2>Update Food Store</h2>
    <form action="" method="post" onsubmit="return confirm('Update?');" >
		 	   
			<div class="">
			<a href="view.php">Cancel</a><br><br>
		    Food Name :
		    <input type="text" name="foodname" value="<?php echo $foodname; ?>">
		    <input type="hidden" name="id" value="<?php echo $id; ?>">
		    <br><br>
		    Price (RM) :
		    <input type="text" name="price" value="<?php echo $price; ?>">
			<br><br>
			Quantity :
		    <input type="text" name="quantity" value="<?php echo $quantity; ?>">
		    <br><br>
			Calorie (k/cal) :
		    <input type="text" name="calorie" value="<?php echo $calorie; ?>">
			<br><br>
		   
		    <input type="submit" value="Update" name="update">
			</div>
		
		</form>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>