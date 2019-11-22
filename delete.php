<?php 

	require_once "dbconnect.php";

	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "SELECT * FROM concert WHERE id = $id";
        $result = mysqli_query($conn, $sql);
		$data = $result->fetch_assoc();

   		$conn->close();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Travel-o-matic blog - DELETE an event</title>
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
   </header>
<div class="container mt-5 pt-5">
<h4>Do you really want to delete this item?</h4>
<form action ="a_delete.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data['id'] ?>" />
   <button type="submit" class="btn btn-danger m-3">Yes, delete it!</button >
   <a href="admin.php" class="btn btn-outline-warning">No, go back!</a>
</form>
</div>
	<footer>
		<div class="container text-center">
			<p>&copy;2019 Copyright: Marina's Travel blog</p>
			</div>
	</footer>

</body>
</html>