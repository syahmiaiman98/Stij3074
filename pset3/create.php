<?php 
include_once("dbconnect.php");

// if the form's submit button is clicked, we need to process the form
	if (isset($_GET['submit'])) {
		// get variables from the form
        $foodname = $_GET['foodname'];
        $price = $_GET['price'];
        $quantity = $_GET['quantity'];
        $calorie = $_GET['calorie'];

		//write sql query

		$sql = "INSERT INTO `foodorder`(`foodname`, `price`, `quantity`, `calorie`) 
        VALUES ('$foodname', '$price', '$quantity','$calorie')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
      echo "<script> alert('New record create successfully')</script>";
      echo "<script> window.location.replace('view.php?') </script>;";
		}else{
			echo "<script> alert('Insert Error')</script>";
      //echo "<script> window.location.replace('register.html') </script>;";
		}

		$conn->close();

	}
?>

<!DOCTYPE html>
<html>
  <head>
  <style>
  			</style>
  </head>
<body>
<br><br><br>
<h2>New Food Store</h2>

<form action="" method="GET">  
    <div class="">
    <a href="view.php">Cancel </a>
    <br><br>

        <label for="foodName">Food Name:</label><br>
        <input type="text" id="foodName" name="foodname" value="" required><br>

        <label for="Price">Price (RM):</label><br>
        <input type="text" id="Price"  name="price" value="" required><br>

        <label for="Quantity">Quantity:</label><br>
        <input type="number" id="Quantity" name="quantity" value="" required><br>

        <label for="Calorie">Calorie (k/cal):</label><br>
        <input type="text" id="Calorie" name="calorie" value="" required><br><br>
    
    <input type="submit" name="submit" value="submit">
          </div>
</form>

</body>
</html>