
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">
                    <?php
                    $connection = mysqli_connect('localhost','root','','syahmi');
                    if(isset($_POST['search'])) {
                        $searchKey = $_POST['search'];
                        $sql = "SELECT * FROM customer WHERE custname LIKE '%$searchKey%' ";
                    }else {
                        $sql = "SELECT * FROM customer";
                        $searchKey = "";
                    }
                    
$result = mysqli_query($connection, $sql);

?>
<a href="view.php"><i class="fa fa-window-close"></i></a>
				<form action="" method="POST">
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Search By Name" value="<?php echo $searchKey; ?>" > 
					</div>
					<div class="col-md-6 text-left">
						 <button class="btn">Search</button>
                    </div>
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
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
                    </tr>

                    <?php while($row = mysqli_fetch_object($result)) { ?> 
					<tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->custname ?></td>
                        <td><?php echo $row->gender ?></td>
						<td><?php echo $row->ic ?></td>
                        <td><?php echo $row->daterental ?></td>
                        <td><?php echo $row->address ?></td>
                        <td><?php echo $row->phonenumber ?></td>
                        <td><?php echo $row->car ?></td>
                        <td><?php echo $row->timestart ?></td>
                        <td><?php echo $row->timefinish ?></td>
                        <td><?php echo $row->totalrent ?></td>
                        
                    </tr>
                    <?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>