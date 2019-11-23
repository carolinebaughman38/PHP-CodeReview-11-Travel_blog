<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
	header("Location: index.php");
	exit;
}

$res=mysqli_query($conn, "SELECT * FROM user WHERE id=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome - <?php echo $userRow['first_name'].' '.$userRow['last_name']; ?></title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- google-fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pontano+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<!-- hero image -->
   	<header style="background: url('img/3.jpg') no-repeat 50% 40%;background-size: cover; position: relative; height: 470px;margin-bottom: 0 !important;">	
		<!-- navbar --->
   	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
   		<a class="navbar-brand pl-5 my-3" href="home.php">Travel-o-matic blog</a>
   		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   		<span class="navbar-toggler-icon"></span>
   		</button>
   		<div class="collapse navbar-collapse" id="navbarNav">
   			<ul class="navbar-nav mr-auto">
   				<li class="nav-item pl-2">
       				<a class="nav-link" href="index.php">Home</a>
      			</li>
      			<li class="nav-item pl-2">
        			<a class="nav-link" href="to_do.php">Things to do</a>
      			</li>
      			<li class="nav-item pl-2">
        			<a class="nav-link" href="concert.php">Concerts</a>
      			</li>
            	<li class="nav-item active pl-2">
              		<a class="nav-link" href="restaurant.php">Restaurants<span class="sr-only">(current)</span></a>
            	</li>
   			</ul>
   			<form class="form-inline my-2 my-lg-0">
     			<input class="form-control mr-sm-2" type="search" name="search_text" id="search_text" aria-label="Search">
      			<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    		</form>	
   		</div> 		
   	</nav>
   </header>

<!-- form with content -->
	<div class="container mt-3">
		<h3>Best Restaurants in Austria and Australia</h3>
	</div>

	<ul class="col-8 mt-5 mx-auto list-unstyled">
		<?php 
  require_once "dbconnect.php";
  $sql_restaurant = "SELECT * FROM location
          INNER JOIN restaurant ON location.fk_restaurant_id=restaurant.id
          ";
  
  $result = mysqli_query($conn, $sql_restaurant);
  if($result->num_rows == 0){
    $row = "No result";
    $res = 0;
  } elseif($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $res = 1;
  } else{
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $res = 2;
  }
  if($res == 0){
    echo $row;
  }elseif($res == 1){
    echo $row["country"]." ". $row["city"]. " " .$row["address"];
  }else{
    foreach ($row as $value) {
      echo "<li class='media mt-2'>
      <img class='mr-3' width='250px' src='".$value["restaurant_image"]."'>
      <div class='media-body'>
            <h5 class='mt-0 mb-1'>" .$value["restaurant_name"]."</h5><br>
            <p>". $value["restaurant_short_description"]."</p>
            <p>Type of cuisine: ". $value["restaurant_type"]."</p>
            <p>Telephone: ".$value["telephone"]."</p>
            <p>ADDRESS: ". $value["zip"]." ". $value["city"].", ".$value["country"].", ". $value["address"]."</p><br>
            <p>For more information: <a href=".$value["restaurant_web_address"].">".$value["restaurant_web_address"]."</a></p>
          </div>
        </li><br><hr/>";
    }
  }
?>  
  </ul>

	<footer>
		<div class="container text-center">
			<p>&copy;2019 Copyright: Marina's Travel blog</p>
			</div>
	</footer>

</body>
</html>

<?php ob_end_flush(); ?> 