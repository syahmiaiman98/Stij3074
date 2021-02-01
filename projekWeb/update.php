<?php 
include_once("dbconnect.php");

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$customer_name = $_POST['custname'];
		$user_id = $_POST['id'];
		$customer_ic = $_POST['ic'];
    	$date_rental = $_POST['daterental'];
    	$address = $_POST['address'];
		$phone_number = $_POST['phonenumber'];
	    $car = $_POST['car'];
    	$time_start = $_POST['timestart'];
   		$time_finish = $_POST['timefinish'];
		$totalrent = $_POST['totalrent'];
		$gender = $_POST['gender'];


		// write the update query
		$sql = "UPDATE `customer` SET `custname`='$customer_name', `ic`='$customer_ic', `daterental`='$date_rental', 
		`address`='$address', `phonenumber`='$phone_number', `car`='$car', `timestart`='$time_start', 
		`timefinish`='$time_finish',`totalrent`='$totalrent',`gender`='$gender' WHERE `id`='$user_id'";

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
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `customer` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->rowCount() > 0) {
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$customer_name = $row['custname'];
			$gender = $row['gender'];
			$customer_ic = $row['ic'];
			$date_rental = $row['daterental'];
			$address = $row['address'];
			$phone_number = $row['phonenumber'];
			$car = $row['car'];
			$time_start = $row['timestart'];
			$time_finish = $row['timefinish'];
			$totalrent  = $row['totalrent'];
			$user_id = $row['id'];
		}

	?>
	
<!DOCTYPE html>
	<html>
    	<head>
		<br><br><br>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        	<title>Update Car Rental</title>
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
		<h2 align="center">Customer Rental Update</h2>
		<form action="" method="post" onsubmit="return confirm('Update?');" >
		  <fieldset>
		    <legend>Customer Information:</legend>
			<div class="page">
			<a href="view.php"><i class="fa fa-window-close"></i></a><br><br>
		    Name :
		    <input type="text" name="custname" value="<?php echo $customer_name; ?>">
		    <input type="hidden" name="id" value="<?php echo $user_id; ?>">
			-- Identity card (ic) :
		    <input type="number" name="ic" value="<?php echo $customer_ic; ?>">
			-- Gender :
		    <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male
		    <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female
		    <br><br>
		    Phone Number :
		    <input type="number" name="phonenumber" value="<?php echo $phone_number; ?>">
			<br><br>
			Date rental (**/**/****):
		    <input type="date" name="daterental" value="<?php echo $date_rental; ?>">
		    <br><br>
			Address (full address) :
		    <input type="text" name="address" value="<?php echo $address; ?>">
			<br><br>
			Car (with plate no.) :
		    <input type="text" name="car" value="<?php echo $car; ?>">
			<br><br>
			time start (**:** a.m./p.m.) :
			<input type="time" name="timestart" value="<?php echo $time_start; ?>">
			<br><br>
			time finish (**:** a.m./p.m.) :
			<input type="time" name="timefinish" value="<?php echo $time_finish; ?>">
			<br><br>
		    Total rent (RM):
		    <input type="number" name="totalrent" value="<?php echo $totalrent; ?>">
		    <br><br>
		   
		    <input type="submit" value="Update" name="update">
			</div>
		  </fieldset>
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