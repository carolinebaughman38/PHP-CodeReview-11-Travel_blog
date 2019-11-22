<?php 
ob_start(); 
session_start();

if (isset($_SESSION['user'])!="") {
	header("Location: home.php");	
}
if (isset($_SESSION['admin'])!="") {
	header("Location: admin.php");	
}
require_once 'dbconnect.php';

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Travel-o-matic blog - Registration</title>
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
   		<a class="navbar-brand pl-5 my-3">Travel-o-matic blog</a>
   	</nav>
   </header>
   <!-- registration form -->
 	<div class="container mt-3">
 	<form id="registr_form">
 		
 		<h2>Register</h2>
 		<hr/>
 		<input id="first_name" type="text" name="first_name" class="form-contol p-2" placeholder="Enter First Name" maxlength="50" value="" /> 
 		<input id="last_name" type="text" name="last_name" class="form-contol p-2" placeholder="Enter Last Name" maxlength="50" value="" />
 		<input id="email" type="text" name="email" class="form-contol p-2" placeholder="Enter your email" maxlength="40" value="" />

		<input id="password" type="text" name="password" class="form-contol p-2" placeholder="Enter password" maxlength="15" value=""/>

		<button type="submit" class="btn btn-outline-info m-3" name="btn-signup">Sign Up</button>

		<p id="result" class="badge badge-warning text-wrap" style="width: 12rem; font-size: 13px"></p>

	<hr />
	<p>Already registered?</p>
		<a href="index.php" class="mt-2 mb-5 btn btn-outline-success">Sign in here</a>
 	</form>
 	
 		
 </div>

 <script>
 	var request;
  
  $("#registr_form").submit(function(event){
  event.preventDefault();

  if (request) {
       request.abort();
  }
  
  var $form = $(this);

  var $inputs = $form.find("input, select, button, textarea");
  var serializedData = $form.serialize();
  $inputs.prop("disabled", true);

   request = $.ajax({
   url: "register_ajax.php",
   type: "post",
   data: serializedData
   });

   request.done(function (response, textStatus, jqXHR){
   document.getElementById("result").innerHTML= response;
        $("#first_name").val("");
        $("#last_name").val("");
        $("#email").val("");
        $("#password").val("");
   });

   request.fail(function (jqXHR, textStatus, errorThrown){
       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });
   request.always(function () {
       $inputs.prop("disabled", false);
   });

});
</script>

	<footer>
		<div class="container text-center">
			<p>&copy;2019 Copyright: Marina's Travel blog</p>
			</div>
	</footer>

 </body>
 </html>
 <?php ob_end_flush(); ?>