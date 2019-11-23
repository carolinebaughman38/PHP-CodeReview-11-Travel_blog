<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
	header("Location: index.php");
	exit;
}
if(isset($_SESSION['user'])) {
 	header("Location: home.php");
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
   		<a class="navbar-brand pl-5 my-3" href="admin.php">Travel-o-matic blog</a>
   		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   		<span class="navbar-toggler-icon"></span>
   		</button>
   		<div class="collapse navbar-collapse" id="navbarNav">
   			<ul class="navbar-nav mr-auto">
   				<li class="nav-item active pl-2">
       				<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item pl-2">
        			<a class="nav-link" href="to_do.php">Things to do</a>
      			</li>
      			<li class="nav-item pl-2">
        			<a class="nav-link" href="concert.php">Concerts</a>
      			</li>
            <li class="nav-item pl-2">
              <a class="nav-link" href="restaurant.php">Restaurants</a>
            </li>
   			</ul>
   			<form class="form-inline my-2 my-lg-0">
     		<input class="form-control mr-sm-2" type="search" name="search_text" id="search_text" aria-label="Search">
      		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    	</form>	
   		</div> 		
   	</nav>
   </header>

<!-- form with content -->
	<div class="container mt-3">
		<h3>Hi Admin <?php echo $userRow['first_name'].' '.$userRow['last_name']; ?></h3>
		<a href="logout.php?logout" class='mt-3 btn btn-outline-dark'>Sign out</a>
		<a href='create.php'class='btn btn-warning float-right'>Add new place/event</a>
	</div>

	<ul class="col-8 mt-5 mx-auto list-unstyled">
		<div id="result"></div>
	</ul>

	<footer>
		<div class="container text-center">
			<p>&copy;2019 Copyright: Marina's Travel blog</p>
			</div>
	</footer>

</body>
</html>

<?php ob_end_flush(); ?> 

<!-- search engine -->
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
