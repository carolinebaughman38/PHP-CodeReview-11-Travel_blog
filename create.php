<?php 

	require_once "dbconnect.php";

	if(isset($_POST["submit"])){

	if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
 		$filename = basename($_FILES['uploaded_file']['name']);
  		$ext = substr($filename, strrpos($filename, '.') + 1);
  	if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && ($_FILES["uploaded_file"]["size"] < 800000000)) {
      $newname = dirname(_FILE_).'/uploads/'.$filename;
// "uploads" is a folder inside of the main folder
      if (!file_exists($newname)) {
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
        $concert_name = $_POST['concert_name'];
  		$concert_short_description = $_POST['concert_short_description'];
        $concert_web_address = $_POST['concert_web_address'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $ticket = $_POST['ticket'];

		$sql = "INSERT INTO concert(`concert_name`,`concert_short_description`,`concert_web_address`,`date`,`time`,`ticket`,`concert_image`)VALUES ('$concert_name','$concert_short_description','$concert_web_address','$date','$time','$ticket','$newname')";

		if($conn->query($sql)=== TRUE){
			//echo "<h3>Updated successfully</h3>";
		header("Refresh:2; url=admin.php");
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
 		$concert_name = $_POST['concert_name'];
  		$concert_short_description = $_POST['concert_short_description'];
        $concert_web_address = $_POST['concert_web_address'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $ticket = $_POST['ticket'];

	$sql = "INSERT INTO concert(`concert_name`,`concert_short_description`,`concert_web_address`,`date`,`time`,`ticket`)VALUES('$concert_name','$concert_short_description','$concert_web_address','$date','$time','$ticket')";

}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Travel-o-matic blog - CREATE new event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- style -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- google-fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pontano+Sans&display=swap" rel="stylesheet">
  </head>

<body>
	<!-- navbar --->
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
   	<!-- form for insert -->
   	<div class="container mt-5 pt-5">
	<form method="POST" enctype="multipart/form-data">
		<p>Concert name: <input type="text" name="concert_name" required></p>
		<p>Short description: <input type="text" name="concert_short_description" id="textarea" required></p>
    	<p>Date: <input type="date" name="date" required></p>
      	<p>Time: <input type="time" name="time"></p>
      	<p>Price: <input type="text" name="ticket" required></p>
      	<p>Web Address: <input type="text" name="concert_web_address" required></p>

		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> 
		<p>Image: <input width="250px" type="file" name="uploaded_file" placeholder="choose a file to upload...jpg" required>
		<img width="250px"></p>

		<button class="btn btn-success mr-2 mb-4" type="submit" name="submit" value="insert">Create data</button>

    <a href="index.php" class="btn btn-warning mb-4">Back to Home Page</a>
	</form>
	</div>
	

	<!-- jQuery,Popper,Bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>