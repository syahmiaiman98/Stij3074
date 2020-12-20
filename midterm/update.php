<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn']

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE book SET coursename = '$coursename', title = '$title', author = '$author', price = '$price', 
        description = '$description', publisher = '$publisher', isbn = '$isbn' WHERE id = '$id'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
<p>
<h2 align='center'><?php echo $name?></h2>
</p>

   <h3 align="center">Update <?php echo $courseid?> </h3>

    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">

        <input type="hidden" id="id" name="id" value="<?php echo $id;?>" required><br>
        <input type="hidden" id="operation" name="operation" value="update"><br>

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $title;?>" required><br>

        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" value="<?php echo $author;?>" required><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $price;?>" required><br><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo $description;?>" required><br><br>

        <label for="publisher">Publisher:</label><br>
        <input type="text" id="publisher" name="publisher" value="<?php echo $publisher;?>" required><br><br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" value="<?php echo $isbn;?>" required><br><br>

        <input type="submit" value="Update">
    </form>
    <p align="center"><a href="mainpage.php">Cancel</a></p>
</body>

</html>