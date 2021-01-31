<?php 
include_once("dbconnect.php");

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
    $customer_name = $_POST['custname'];
    $customer_ic = $_POST['ic'];
    $date_rental = $_POST['daterental'];
    $address = $_POST['address'];
		$phone_number = $_POST['phonenumber'];
    $car = $_POST['car'];
    $time_start = $_POST['timestart'];
    $time_finish = $_POST['timefinish'];
		$totalrent = $_POST['totalrent'];
		$gender = $_POST['gender'];

		//write sql query

		$sql = "INSERT INTO `customer`
    (`custname`, `ic`, `daterental`, `address`, `phonenumber`, `car`, `timestart`, `timefinish`, `totalrent`, `gender`) 
    VALUES 
    ('$customer_name', '$customer_ic', '$date_rental', '$address', '$phone_number', '$car', '$time_start',
     '$time_finish', '$totalrent', '$gender')";

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
<br><br><br>
<h2 align="center">New Rental</h2>

<form action="" method="POST">
  <fieldset>

    <legend>Personal information:</legend>
    <div class="page">
    <a href="view.php">Cancel </a>
    <br><br>
    Name :
    <input type="text" name="custname">
    -- Identity card (ic) :
    <input type="text" name="ic">
    -- Gender :
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <br><br>
    Phone Number :
    <input type="text" name="phonenumber">
    <br><br>
    Date rental (**/**/****):
    <input type="text" name="daterental">
    <br><br>
    Address (full address) :
    <input type="text" name="address">
    <br><br>
    Car (with plate no.) :
    <input type="text" name="car">
    <br><br>
    time start (**:** a.m./p.m.) :
    <input type="text" name="timestart">
    <br><br>
    time finish (**:** a.m./p.m.) :
    <input type="text" name="timefinish">
    <br><br>
    total rent (RM) :
    <input type="text" name="totalrent">
    <br><br>
    <input type="submit" name="submit" value="submit">
          </div>
  </fieldset>
</form>

</body>
</html>