<?php 
include_once("dbconnect.php");

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// write delete query
	$sql = "DELETE FROM `foodorder` WHERE `id`='$id'";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "<script> alert('Delete Success')</script>";
		echo "<script> window.location.replace('view.php') </script>;";
	}else{
		echo "<script> alert('Delete Error')</script>";;
	}
}

?>