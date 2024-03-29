<?php 
ob_start();
session_start();
require_once 'dbconnect.php';

//update concert
	if(isset($_GET["id"])){
		$concert_id = $_GET["id"];
		$sql_concert = "SELECT * FROM location INNER JOIN concert ON location.fk_concert_id=concert.id WHERE concert.id=$concert_id";
		$result = mysqli_query($conn ,$sql_concert);
		$row = $result->fetch_assoc();
	}

	if(isset($_POST["submit"])){
	if((!empty($_FILES['uploaded_file'])) && ($_FILES['uploaded_file']['error'] == 0)) {
 	 $filename = basename($_FILES['uploaded_file']['name']);
  	$ext = substr($filename, strrpos($filename, '.') + 1);

  if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
	($_FILES["uploaded_file"]["size"] < 800000000000)) {
      $newname = dirname(_FILE_).'/uploads/'.$filename;
// "uploads" is a folder inside of the main folder
      if (!file_exists($newname)) {
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
        $concert_id = $_GET['id'];
        $concert_name = $_POST['concert_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $concert_short_description = $_POST['concert_short_description'];
        $ticket = $_POST['ticket'];
        $concert_web_address = $_POST['concert_web_address'];

  $sql_concert = "UPDATE concert SET concert_name='$concert_name',`date`='$date',`time`='$time',concert_short_description='$concert_short_description',ticket='$ticket',concert_web_address='$concert_web_address',concert_image='$newname' WHERE id=$concert_id";

	if(mysqli_query($conn, $sql_concert)){
		//echo "<h3>Updated successfully</h3>";
		header("Refresh:3; url=admin.php");
	}
        } else {
           echo "Error: A problem occurred during file upload!";
        }
      } else {
         echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
      }
  } else {
     echo "Error: Only .jpg images under 350Kb are accepted for upload";
  }
} else {
        $concert_id = $_GET['id'];
        $concert_name = $_POST['concert_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $concert_short_description = $_POST['concert_short_description'];
        $ticket = $_POST['ticket'];
        $concert_web_address = $_POST['concert_web_address'];

	$sql_concert = "UPDATE concert SET concert_name='$concert_name',`date`='$date',`time`='$time',concert_short_description='$concert_short_description',ticket='$ticket',concert_web_address='$concert_web_address' WHERE `id`=$concert_id";

	if(mysqli_query($conn, $sql_concert)){
		//echo "<h3>Updated successfully without image!!</h3>";
		header("Refresh:3; url=admin.php");
	}
}

$sqli = "SELECT * FROM concert";
$res = mysqli_query($conn,$sqli);
$result = $res->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Travel-o-matic blog - UPDATE Concert</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- style -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- google-fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pontano+Sans&display=swap" rel="stylesheet">
  </head>

<body>
  <header>
	<!-- navbar  -->
   	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
   		<a class="navbar-brand pl-5 my-3" href="index.php">Travel-o-matic blog</a>
   		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   		<span class="navbar-toggler-icon"></span>
   		</button>
   		<div class="collapse navbar-collapse" id="navbarNav">
   			<ul class="navbar-nav">
   				<li class="nav-item active pl-5">
       				<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item pl-5">
              <a class="nav-link" href="to_do.php">Things to do</a>
            </li>
            <li class="nav-item pl-5">
              <a class="nav-link" href="concert.php">Concerts</a>
            </li>
            <li class="nav-item pl-5">
              <a class="nav-link" href="restaurant.php">Restaurants</a>
            </li>
   			</ul>
   		</div> 		
   	</nav>
     </header>
   	<!-- form for update -->
  <div class="container mt-5">

	<!-- form for update image -->
	<form enctype="multipart/form-data" method="post">
		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
		<p>Concert name: <input type="text" name="concert_name" value="<?php echo $row['concert_name'] ?>"></p>
		<p>Short description: <input type="text" name="concert_short_description" id="textarea" value="<?php echo $row['concert_short_description'] ?>"></p>
    <p>Date: <input type="date" name="date" value="<?php echo $row['date'] ?>"></p>
    <p>Time: <input type="time" name="time" value="<?php echo $row['time'] ?>"></p>
    <p>Price: <input type="text" name="ticket" value="<?php echo $row['ticket'] ?>"></p>
    <p>Web Address: <input type="text" name="concert_web_address" value="<?php echo $row['concert_web_address'] ?>"></p>

    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> 
    <p>Image: <img width="250px" src="<?php echo $row['concert_image'] ?>" alt=""></p>
    <p>Choose a file to upload: <input name="uploaded_file" type="file" />
    <input type="submit" value="Update" name="submit" /></p>
  </form> 

	</div>

	<footer>
    <div class="container text-center">
      <p>&copy;2019 Copyright: Marina's Travel blog</p>
      </div>
  </footer>

	<!-- jQuery,Popper,Bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>